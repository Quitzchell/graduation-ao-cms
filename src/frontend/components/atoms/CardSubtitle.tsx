import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum CardSubtitleColors {
    DARK = "dark",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

export enum CardSubtitleSizes {
    SM = "sm",
}

const colorMap = {
    dark: "text-neutral-900",
    neutral: "text-neutral-0",
    teal: "text-teal-300",
};
const sizeMap = {
    sm: "text-sm",
};

function CardSubtitle({ title, color, size }) {
    const titleClass = cn("font-mazzard font-bold", colorMap[color], sizeMap[size]);

    return <div className={titleClass}>{title}</div>;
}

CardSubtitle.propTypes = {
    title: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(CardSubtitleColors)).isRequired,
    size: PropTypes.oneOf(Object.values(CardSubtitleSizes)).isRequired,
};

CardSubtitle.defaultProps = {
    title: "List Item Title",
    color: CardSubtitleColors,
    size: CardSubtitleSizes,
};

export default CardSubtitle;
