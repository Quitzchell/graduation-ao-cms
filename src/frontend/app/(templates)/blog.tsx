import Blocks from "@/blocks/Blocks";
import BlogPostCard from "@/blocks/blog/BlogPostCard";
import Header from "@/blocks/common/Header";


export default function Blog({headerItems, blogPostItems, blocks}) {
    return (
        <div>
            <Header {...headerItems}/>
            <section className="container py-5 md:py-8 flex flex-col gap-y-4">
                {blogPostItems.map((blogPostItem) => (
                    <BlogPostCard key={blogPostItem.uuid} blogPostItem={blogPostItem}/>
                ))}
                {blocks !== null && <Blocks blocks={blocks}/>}
            </section>
        </div>
    );
}

