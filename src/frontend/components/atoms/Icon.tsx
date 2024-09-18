import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum Colors {
    NEUTRAL = "neutral",
    BLUE = "blue",
    TEAL = "teal",
}

const colorMap = {
    [Colors.NEUTRAL]: "stroke-neutral-0",
    [Colors.BLUE]: "stroke-blue-75",
    [Colors.TEAL]: "stroke-teal-200",
};

const basePath = "./Path/To/Icons/";

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
    color: PropTypes.string,
    width: PropTypes.number.isRequired,
    height: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
};

Icon.defaultProps = {
    color: "neutral",
    width: 12,
    height: 12,
    name: "phone",
};

export default Icon;
