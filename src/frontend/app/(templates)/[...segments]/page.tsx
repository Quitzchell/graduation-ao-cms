import { Metadata } from "next";
import { notFound } from "next/navigation";

import { fetchPage } from "@/lib/fetchPage";

import Default from "@/app/(templates)/default";

const templates = {
    default: Default,
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
