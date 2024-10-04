import Image from "next/image";

export default function Hero({image}) {
    return (
        <>
            <div className="fixed -z-20 h-full w-full overflow-hidden">
                <Image
                    src={image}
                    alt="Header image"
                    quality={100}
                    fill
                    sizes={"w-screen"}
                    className={"object-cover"}
                />
                <div
                    className={"fixed h-full w-full bg-gradient-to-b from-neutral-900/50 from-10% via-transparent via-70% to-neutral-900/100"}
                />
            </div>
        </>
    )
}
