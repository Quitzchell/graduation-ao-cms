import Blocks from "@/components/Blocks";


export default function Blog({title, blocks}) {
    return (
        <div>
            {title}
            {blocks !== null && <Blocks blocks={blocks}/>}
        </div>
    );
}
