import Blocks from "@/blocks/Blocks";
import BlogPostCard from "@/blocks/blog/BlogPostCard";
import TemplateHeader from "@/blocks/common/TemplateHeader";


export default function Blog({headerItems, blogPostItems, blocks}) {
    return (
        <div>
            <TemplateHeader {...headerItems}/>
            <section className="container py-5 md:py-8 flex flex-col gap-y-4">
                {blogPostItems.map((blogPostItem) => (
                    <BlogPostCard key={blogPostItem.uuid} blogPostItem={blogPostItem}/>
                ))}
                {blocks !== null && <Blocks blocks={blocks}/>}
            </section>
        </div>
    );
}

