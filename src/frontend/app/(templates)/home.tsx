
import Blocks from "@/components/Blocks";
import Hero from "@/components/Header/Hero";
import PersonCard from "@/components/Person/PersonCard";

export default function Home({bgImage, headerItems, people, blocks}) {
    return (
        <>
            <Hero image={bgImage}/>
            <Header items={headerItems}/>
            <People people={people}/>
            {blocks !== null && <Blocks blocks={blocks}/>}
        </>
    );
}

function Header({items}) {
    return (
        <div className="flex flex-col items-center md:items-start gap-y-4 pt-20 text-neutral-0 md:gap-y-6 md:pt-8">
            <div className="px-4 md:px-8 flex w-80 flex-col gap-y-1 md:w-full md:gap-y-2">
                <h1 className="text-center md:text-start text-4xl font-bold md:text-5xl">{items.title}</h1>
                <h2 className="text-center md:text-start text-3xl md:text-4xl">{items.subtitle}</h2>
            </div>
        </div>
    )
}

function People({people}) {
    return (
        <section className={"container py-10 flex flex-wrap justify-center gap-6"}>
            {people.map((person) => (
                <PersonCard key={person.uuid} person={person}/>
            ))}
        </section>
    )
}




