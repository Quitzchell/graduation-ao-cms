import Blocks from "@/components/Blocks";
import Header from "@/components/Header/Header";

export default function Default({header_items, blocks}) {
    return (
        <>
            <Header image={header_items.image} title={header_items.title} subtitle={header_items.subtitle}/>
            {blocks !== null && <Blocks blocks={blocks}/>}
            <div className='container break-words'>
                {/*{JSON.stringify(props)}*/}
            </div>
        </>
    );
}
