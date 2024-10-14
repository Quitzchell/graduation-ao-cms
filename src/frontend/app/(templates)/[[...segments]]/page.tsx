import { Metadata } from "next";
import { notFound } from "next/navigation";

import Blog from "@/app/(templates)/blog";
import BlogPost from "@/app/(templates)/blogpost";
import Home from "@/app/(templates)/home";
import Review from "@/app/(templates)/review";
import ReviewItem from "@/app/(templates)/reviewItem";
import { fetchPage } from "@/lib/fetchUtils";

const templates = {
    home: Home,
    blog: Blog,
    review: Review
};

const objects = {
    blogpost: BlogPost,
    review: ReviewItem
}

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

    if (objects[page?._object] !== undefined) {
        const Object = objects[page._object];
        console.log(Object)

        return <Object {...page} />
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
