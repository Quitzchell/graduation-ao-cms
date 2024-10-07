import Image from "next/image";

export default function Header({headerImage, headerTitle}) {
    return (
        <header className="h-80 md:h-100 lg:h-140 relative overflow-hidden w-screen">
            <div className="h-full z-10 flex justify-center items-end">
                <div className="bg-neutral-900/80 w-full py-3">
                    <h1 className="text-neutral-0 w-3/4 mx-auto font-bold capitalize text-center text-3xl md:text-4xl">{headerTitle}</h1>
                </div>
            </div>
            <Image
                src={headerImage}
                alt="header image"
                quality={100}
                fill
                priority
                sizes="w-screen h-fit"
                className="object-cover md:object-top -z-10"
            />
        </header>
    )
}
