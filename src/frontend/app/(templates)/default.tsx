import Blocks from "@/components/Blocks";
import Image from "next/image"

export default function Page(props) {
    return (
        <>
            <div className="relative h-120">
                <div className="absolute -z-20 h-full w-full overflow-hidden">
                    <Image
                        src={props.header_image}
                        alt="Hero image"
                        quality={100}
                        fill
                        className="object-cover"
                    />
                    <div
                        className={
                            "absolute h-full w-full bg-gradient-to-t from-neutral-900/70 to-transparent"
                        }
                    />
                </div>
                <div className="flex flex-col items-center gap-y-4 pt-40 text-neutral-0 md:gap-y-6 md:pt-50">
                    <div className="container flex w-80 flex-col gap-y-1 md:w-full md:gap-y-2">
                        <h1 className="text-center text-4xl font-bold md:text-5xl">{'Familie Bonaparte'}</h1>
                        <h2 className="text-center text-3xl md:text-4xl">{'In het AllesOnline CMS'}</h2>
                    </div>
                </div>
            </div>
            {props?.blocks !== null && <Blocks blocks={props.blocks}/>}
            <div className='container break-words'>
                {JSON.stringify(props)}
            </div>
        </>
    );
}
