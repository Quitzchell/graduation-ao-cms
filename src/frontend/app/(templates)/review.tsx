import Blocks from "@/blocks/Blocks";
import TemplateHeader from "@/components/common/TemplateHeader";
import ReviewCard from "@/components/review/ReviewCard";

export default function Review({headerItems, reviewItems, blocks}) {
    return (
        <div>
            <TemplateHeader {...headerItems} />
            <section className="container py-5 md:py-8 flex flex-col gap-y-6">
                {reviewItems.map((reviewItem) => (
                    <ReviewCard key={reviewItem.uuid} reviewItem={reviewItem}/>
                ))}
            </section>
            {blocks !== null && <Blocks blocks={blocks}/>}
        </div>
    )
}
