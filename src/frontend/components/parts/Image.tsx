import React from "react"

import NextImage, {ImageProps as NextImageProps} from "next/image";

type ImageProps = Omit<NextImageProps, 'src'> & {
    image?: string;
    width?: number;
    height: number;
    alt?: string;
};

function Image(
    {
        image = "",
        width = 250,
        height,
        alt = "image",
        ...props
    }: ImageProps
) {
    if (!image || image === "#") {
        console.warn("Invalid image source:", image);
        return null;
    }
    return (
        <NextImage
            className="h-full w-full object-cover"
            src={image}
            alt={alt}
            width={width}
            height={height}
            {...props}
        />
    );
}

export default Image;
