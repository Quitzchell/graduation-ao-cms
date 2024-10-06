import { Metadata } from "next";
import { notFound } from "next/navigation";

import Blog from "@/app/(templates)/blog";
import Home from "@/app/(templates)/home";
import { fetchPage } from "@/lib/fetchUtils";

const templates = {
    home: Home,
    blog: Blog,
};

type PageProps = {
    params: { segments: string[] };
    searchParams: { [key: string]: string | string[] | undefined };
};

export default async function Page({ params }: PageProps) {
    const segments = params.segments || ["home"];
    const page = await fetchPage(segments.join("/"));

    if (templates[page?._template] !== undefined) {
        const Template = templates[page._template];
        console.log(Template);

        return <Template {...page} />;
    }

    return notFound();
}

export async function generateMetadata({ params }: PageProps): Promise<Metadata> {
    const segments = params.segments || ["home"];
    const page = await fetchPage(segments.join("/"));

    if (!page?.meta) {
        return {};
    }

    return {
        title: page.meta.title,
        description: page.meta.description,
    };
}
