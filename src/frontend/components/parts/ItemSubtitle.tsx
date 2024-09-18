import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum ItemSubtitleColors {
    DARK = "dark",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

export enum ItemSubtitleSizes {
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

function ItemSubtitle({ title, color, size }) {
    const titleClass = cn("font-mazzard font-bold", colorMap[color], sizeMap[size]);

    return <div className={titleClass}>{title}</div>;
}

ItemSubtitle.propTypes = {
    title: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(ItemSubtitleColors)).isRequired,
    size: PropTypes.oneOf(Object.values(ItemSubtitleSizes)).isRequired,
};

ItemSubtitle.defaultProps = {
    title: "List Item Title",
    color: ItemSubtitleColors,
    size: ItemSubtitleSizes,
};

export default ItemSubtitle;
