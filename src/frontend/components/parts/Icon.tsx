import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum IconColors {
    NEUTRAL = "neutral",
    BLUE = "blue",
    TEAL = "teal",
}

const colorMap = {
    [IconColors.NEUTRAL]: "stroke-neutral-0",
    [IconColors.BLUE]: "stroke-blue-75",
    [IconColors.TEAL]: "stroke-teal-200",
};

const basePath = "/icons/";

function Icon({ color, width, height, name }) {
    const iconClass = cn(colorMap[color]);
    const path = `${basePath}${name}.svg`;

    return (
        <img
            width={width}
            height={height}
            src={path}
            className={iconClass}
            alt=""
        />
    );
}

Icon.propTypes = {
    color: PropTypes.oneOf(Object.values(IconColors)).isRequired,
    width: PropTypes.number.isRequired,
    height: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
};

Icon.defaultProps = {
    color: IconColors.NEUTRAL,
    width: 12,
    height: 12,
    name: "phone",
};

export default Icon;
