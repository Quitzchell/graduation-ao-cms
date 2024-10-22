import Link from "next/link";

import {Button} from "@/components/ui/button";

export default function BlogPostCard({blogPostItem}) {
    const {title, excerpt, publishedAt, categoryName, slug} = blogPostItem
    return (
        <div data-cypress="blogpost-card" className="p-4 border rounded-md flex flex-col gap-y-2 md:gap-y-4">
            <div>
                <h3 className="font-bold text-lg">{title}</h3>
                <p className='text-sm'>Category: {categoryName}</p>
                <p className='text-sm'>Published at: {publishedAt}</p>
            </div>
            <p>{excerpt}</p>
            <Button asChild><Link href={`blog/${slug}`}>Read more</Link></Button>
        </div>
    )
}
