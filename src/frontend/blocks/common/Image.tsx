import Image from "next/image";

export default function ImageContent({image}) {
    return (
        <div className={'container py-3'}>
            <Image
                src={image}
                alt={"image"}
                quality={100}
                height={1280}
                width={900}
                priority
                sizes="w-full h-full"
                className="object-scale-down"
            />
        </div>
    )
}
