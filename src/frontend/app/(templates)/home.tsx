import Image from "next/image";

import Blocks from "@/blocks/Blocks";
import About from "@/blocks/home/About";


export default function Home({headerItems, aboutItems, blocks}) {
    return (
        <>
            <Header {...headerItems}/>
            <div className={"container"}>
                <About {...aboutItems}/>
                {blocks !== null && <Blocks blocks={blocks}/>}
            </div>
        </>
    );
}

function Header({headerImage, headerTitle}) {
    return (
        <header className="h-120 lg:h-136 xl:h-168 relative overflow-hidden w-screen">
            <div className="h-full z-10 mt-20 lg:mt-30 xl:mt-40 flex justify-center items-center">
                <div className="bg-neutral-900/80 w-full py-3">
                    <h1 className="text-neutral-0 w-3/4 lg:w-1/4 xl:w-1/6 mx-auto font-bold uppercase text-center text-3xl">{headerTitle}</h1>
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
