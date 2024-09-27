import Blocks from "@/components/Blocks";
import Hero from "@/components/Header/Header";
import FamilyTree from "@/components/FamilyTree/FamilyTree";

export default function Home({header_items, blocks, people}) {
    return (
        <>
            <Hero image={header_items.image} title={header_items.title} subtitle={header_items.subtitle}/>
            <FamilyTree people={people} />
            {blocks !== null && <Blocks blocks={blocks}/>}


        </>
    );
}
