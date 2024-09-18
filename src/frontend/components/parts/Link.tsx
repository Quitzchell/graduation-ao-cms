import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

import Icon from "./Icon";

export enum LinkColors {
    DARKGREEN = "darkgreen",
    GREEN = "green",
    NEUTRAL = "neutral",
    TEAL = "teal",
}

const colorMap = {
    [LinkColors.DARKGREEN]: "text-darkgreen-200",
    [LinkColors.GREEN]: "text-green-300",
    [LinkColors.NEUTRAL]: "text-neutral-0",
    [LinkColors.TEAL]: "text-teal-300",
};

function Link({ color, text, url, icon }) {
    const classes = cn(colorMap[color], icon ? "flex items-center gap-4" : "");

    return (
        <a
            href={url}
            className={classes}
        >
            {icon && (
                <Icon
                    width={25}
                    height={25}
                    name={icon}
                />
            )}
            <span>{text}</span>
        </a>
    );
}

Link.propTypes = {
    color: PropTypes.oneOf(Object.values(LinkColors)).isRequired,
    text: PropTypes.string.isRequired,
    url: PropTypes.string.isRequired,
    icon: PropTypes.string,
};

Link.defaultProps = {
    color: LinkColors.NEUTRAL,
    text: "link",
    url: "#",
};

export default Link;
