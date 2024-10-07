import Blocks from "@/blocks/Blocks";

export default function BlogPost({blocks}) {
    return(
        <div className="container">
            {blocks !== null && <Blocks blocks={blocks}/>}
        </div>
    )
}
