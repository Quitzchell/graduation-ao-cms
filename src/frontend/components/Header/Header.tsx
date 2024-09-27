import Image from "next/image";

export default function Header({image, title, subtitle}) {
    return (
        <div className="relative h-screen">
            <div className="absolute -z-20 h-full w-full overflow-hidden">
                <Image
                    src={image}
                    alt="Header image"
                    quality={100}
                    fill
                    className="object-cover object-bottom"
                />
                <div
                    className={"absolute h-full w-full bg-gradient-to-b from-neutral-900/50 from-10% via-transparent via-70% to-neutral-0/100"}
                />
            </div>
            <div className="flex flex-col items-center md:items-start gap-y-4 pt-20 text-neutral-0 md:gap-y-6 md:pt-8">
                <div className="px-4 md:px-8 flex w-80 flex-col gap-y-1 md:w-full md:gap-y-2">
                    <h1 className="text-center md:text-start text-4xl font-bold md:text-5xl">{title}</h1>
                    <h2 className="text-center md:text-start text-3xl md:text-4xl">{subtitle}</h2>
                </div>
            </div>
        </div>
    )
}
