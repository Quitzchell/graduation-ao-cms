
import Blocks from "@/blocks/Blocks";
import DetailHeader from "@/components/common/DetailHeader";

export default function BlogPost({title, image, blocks}) {
    return (
        <>
            <DetailHeader title={title} image={image}/>
            <div className="container py-5 md:py-8">
                {blocks !== null && <Blocks blocks={blocks}/>}
            </div>
        </>
    )
}
