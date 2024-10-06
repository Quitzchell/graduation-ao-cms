import Image from "next/image";
import Link from "next/link";

import Blocks from "@/blocks/Blocks";
import {Button} from "@/components/ui/button";


export default function Blog({headerItems, blogPostItems, blocks}) {
    return (
        <div>
            <Header {...headerItems}/>
            <BlogPostList blogPostItems={blogPostItems}/>
            {blocks !== null && <Blocks blocks={blocks}/>}
        </div>
    );
}

function Header({headerImage, headerTitle}) {
    return (
        <header className="h-52 relative overflow-hidden w-screen">
            <div className="h-full z-10 flex justify-center items-end">
                <div className="bg-neutral-900/80 w-full py-3">
                    <h1 className="text-neutral-0 w-3/4 mx-auto font-bold capitalize text-center text-3xl">{headerTitle}</h1>
                </div>
            </div>
            <Image
                src={headerImage}
                alt="header image"
                quality={100}
                fill
                priority
                sizes="w-screen h-fit"
                className="object-cover -z-10"
            />
        </header>
    )
}

function BlogPostList({blogPostItems}) {
    return (
        <section className="container py-5 flex flex-col gap-y-4">
            {blogPostItems.map((blogPostItem) => (
                <BlogPostCard key={blogPostItem.uuid} blogPostItem={blogPostItem}/>
            ))}
        </section>
    )
}

function BlogPostCard({blogPostItem}) {
    const {title, excerpt, publishedAt, categoryName, uuid} = blogPostItem
    return (
        <div className={"p-4 border flex flex-col gap-y-2"}>
            <div>
                <h3 className={"font-bold text-lg"}>{title}</h3>
                <p className={'text-sm'}>Category: {categoryName}</p>
                <p className={'text-sm'}>Published at: {publishedAt}</p>
            </div>
            <p>{excerpt}</p>
            <Button asChild><Link href={`blog/${uuid}`}>Read more</Link></Button>
        </div>
    )
}
