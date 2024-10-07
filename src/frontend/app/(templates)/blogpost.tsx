import Image from "next/image";

import Blocks from "@/blocks/Blocks";

export default function BlogPost({title, image, blocks}) {
    return(
        <>
            <header className="h-52 relative overflow-hidden w-screen">
                <div className="h-full z-10 flex justify-center items-end">
                    <div className="bg-neutral-900/80 w-full py-3">
                        <h1 className="text-neutral-0 w-3/4 mx-auto font-bold capitalize text-center text-xl">{title}</h1>
                    </div>
                </div>
                <Image
                    src={image}
                    alt="header image"
                    quality={100}
                    fill
                    priority
                    sizes="w-screen h-fit"
                    className="object-cover -z-10"
                />
            </header>
            <div className="container">
                {blocks !== null && <Blocks blocks={blocks}/>}
            </div>
        </>
    )
}
