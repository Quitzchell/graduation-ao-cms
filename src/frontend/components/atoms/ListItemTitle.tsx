import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum ListItemTitleColor {
    DARK = "dark",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

export enum ListItemTitleSize {
    XL = "xl",
}

const colorMap = {
    [ListItemTitleColor.DARK]: "text-neutral-900",
    [ListItemTitleColor.NEUTRAL]: "text-neutral-0",
    [ListItemTitleColor.TEAL]: "text-teal-300",
};
const sizeMap = {
    [ListItemTitleSize.XL]: "text-xl",
};

function ListItemTitle({ title, color, size }) {
    const titleClass = cn("font-mazzard font-bold", colorMap[color], sizeMap[size]);

    return <div className={titleClass}>{title}</div>;
}

ListItemTitle.propTypes = {
    title: PropTypes.string.isRequired,
    color: PropTypes.string.isRequired,
    size: PropTypes.string.isRequired,
};

ListItemTitle.defaultProps = {
    title: "List Item Title",
    color: [ListItemTitleColor.DARK],
    size: [ListItemTitleSize.XL],
};

export default ListItemTitle;
