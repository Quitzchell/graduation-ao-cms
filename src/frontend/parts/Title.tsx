import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum Colors {
    DARKGREEN = "darkgreen",
    GREEN = "green",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

export const sizes = {
    "4XL": "4xl",
};

const colorMap = {
    darkgreen: "text-darkgreen-200",
    green: "text-green-300",
    neutral: "text-neutral-0",
    teal: "text-teal-300",
};

const sizeMap = {
    "4xl": "text-4xl",
    "5xl": "text-5xl",
};

function Title({ title, color, size }) {
    const titleClass = cn("font-mazzard", colorMap[color], sizeMap[size]);

    return <div className={titleClass}>{title}</div>;
}

Title.propTypes = {
    title: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(Colors)).isRequired,
    size: PropTypes.string.isRequired,
};

Title.defaultProps = {
    title: "Title",
    color: "darkgreen",
    size: "5xl",
};

export default Title;
