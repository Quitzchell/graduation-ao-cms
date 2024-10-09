import Blocks from "@/blocks/Blocks";
import Header from "@/blocks/common/Header";

function ReviewCard({reviewItem}) {
    return (
        <div>

        </div>
    )
}

export default function review({headerItems, reviewItems, blocks}) {
    return (
        <div>
            <Header {...headerItems} />
            <section className="container py-5 md:py-8 flex flex-col gap-y-4">
                {reviewItems.map((reviewItem) => (
                    <ReviewCard key={reviewItem.uuid} reviewItem={reviewItem}/>
                ))}
            </section>
            {blocks !== null && <Blocks blocks={blocks}/>}
        </div>
    )
}
