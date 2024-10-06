import Blocks from "@/blocks/Blocks";

export default function BlogPost({blocks}) {
    return(
        <>
            {blocks !== null && <Blocks blocks={blocks}/>}
        </>
    )
}
