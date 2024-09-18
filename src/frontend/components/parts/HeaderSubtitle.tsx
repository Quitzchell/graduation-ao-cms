import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum HeaderSubtitleColors {
    NEUTRAL = "neutral",
}

export enum HeaderSubtitleSizes {
    SIX_XL = "6xl",
}

const colorMap = {
    [HeaderSubtitleColors.NEUTRAL]: "text-neutral-0",
};

const sizeMap = {
    "6xl": "text-6xl",
};

function HeaderSubtitle({ title, color, size }) {
    const titleClass = cn("font-luckyfellas", colorMap[color], sizeMap[size]);

    return <div className={titleClass}>{title}</div>;
}

HeaderSubtitle.propTypes = {
    title: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(HeaderSubtitleColors)).isRequired,
    size: PropTypes.oneOf(Object.values(HeaderSubtitleSizes)).isRequired,
};

HeaderSubtitle.defaultProps = {
    title: "Header Subtitle",
    color: HeaderSubtitleColors.NEUTRAL,
    size: HeaderSubtitleSizes.SIX_XL,
};

export default HeaderSubtitle;
