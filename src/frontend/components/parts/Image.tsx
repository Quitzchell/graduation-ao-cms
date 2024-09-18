import NextImage from "next/image";
import PropTypes from "prop-types";

function Image({ image, width, height, alt }) {
    return (
        <NextImage
            className="h-full w-full object-cover"
            src={image}
            alt={alt}
            width={width}
            height={height}
        />
    );
}

Image.propTypes = {
    image: PropTypes.string.isRequired,
    width: PropTypes.number.isRequired,
    height: PropTypes.number.isRequired,
    alt: PropTypes.string.isRequired,
};

Image.defaultProps = {
    image: "",
    width: 250,
    alt: "image",
};

export default Image;
