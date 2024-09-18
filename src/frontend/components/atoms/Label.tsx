import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

import Icon from "./Icon";

export enum LabelColors {
    BLUE = "blue",
    GREEN = "green",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

const colorMap = {
    [LabelColors.BLUE]: "text-blue-75",
    [LabelColors.GREEN]: "text-green-300",
    [LabelColors.NEUTRAL]: "text-neutral-0",
    [LabelColors.TEAL]: "text-teal-200",
};

function Label({ color, text, icon }) {
    const classes = cn("text-base", colorMap[color], icon ? "flex items-center gap-2" : "");

    return (
        <span className={classes}>
            {icon && (
                <Icon
                    width={20}
                    height={20}
                    name={icon}
                    color={color}
                />
            )}
            <span>{text}</span>
        </span>
    );
}

Label.propTypes = {
    color: PropTypes.oneOf(Object.values(LabelColors)).isRequired,
    text: PropTypes.string.isRequired,
    icon: PropTypes.string,
};

Label.defaultProps = {
    color: LabelColors.NEUTRAL,
    text: "link",
    url: "#",
};

export default Icon;
