import Image from "next/image";

import About from "@/blocks/home/About";
import Blocks from "@/components/Blocks";


export default function Home({headerItems, aboutItems, blocks}) {
    return (
        <>
            <Header {...headerItems}/>
            <About {...aboutItems}/>
            {blocks !== null && <Blocks blocks={blocks}/>}
        </>
    );
}

function Header({headerImage, headerTitle}) {
    return (
        <header className="h-120 relative overflow-hidden w-screen">
            <div className="h-full z-10 mt-20 flex justify-center items-center">
                <div className="bg-neutral-900/80 w-full py-3">
                    <h1 className="text-neutral-0 w-3/4 mx-auto font-bold uppercase text-center text-3xl">{headerTitle}</h1>
                </div>
            </div>
            <Image
                src={headerImage}
                alt="header image"
                quality={100}
                fill
                priority
                sizes="w-screen h-fit"
                className="object-cover -z-10"
            />
        </header>
    )
}
