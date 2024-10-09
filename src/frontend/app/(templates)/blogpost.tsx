
import Blocks from "@/blocks/Blocks";
import BlogPostHeader from "@/blocks/blog/BlogPostHeader";

export default function BlogPost({title, image, blocks}) {
    return (
        <>
            <BlogPostHeader title={title} image={image}/>
            <div className="container py-5 md:py-8">
                {blocks !== null && <Blocks blocks={blocks}/>}
            </div>
        </>
    )
}
