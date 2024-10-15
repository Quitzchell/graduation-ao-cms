import Blocks from "@/blocks/Blocks";
import DetailHeader from "@/components/common/DetailHeader";
import MovieInfoCard from "@/components/review/MovieInfoCard";


export default function ReviewItem({title, image, reviewItem, blocks}) {
    return (
        <>
            <DetailHeader image={image} title={title}/>
            <section className="container py-5 md:py-8">
                {reviewItem.type === 'movie' && (
                    <>
                        <MovieInfoCard {...reviewItem} />
                    </>
                )}
                {blocks !== null && <Blocks blocks={blocks}/>}
            </section>
        </>
    )
}
