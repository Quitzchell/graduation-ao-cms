import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum TitleColors {
    DARKGREEN = "darkgreen",
    GREEN = "green",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

export enum TitleSizes {
    FOUR_XL = "4xl",
    FIVE_XL = "5xl",
}

const colorMap = {
    [TitleColors.DARKGREEN]: "text-darkgreen-200",
    [TitleColors.GREEN]: "text-green-300",
    [TitleColors.NEUTRAL]: "text-neutral-0",
    [TitleColors.TEAL]: "text-teal-300",
};

const sizeMap = {
    [TitleSizes.FOUR_XL]: "text-4xl",
    [TitleSizes.FIVE_XL]: "text-5xl",
};

function Title({ title, color, size }) {
    const titleClass = cn("font-mazzard", colorMap[color], sizeMap[size]);

    return <div className={titleClass}>{title}</div>;
}

Title.propTypes = {
    title: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(TitleColors)).isRequired,
    size: PropTypes.oneOf(Object.values(TitleSizes)).isRequired,
};

Title.defaultProps = {
    title: "Title",
    color: TitleColors.DARKGREEN,
    size: TitleSizes.FIVE_XL,
};

export default Title;
