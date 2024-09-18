import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum TextColors {
    NEUTRAL = "neutral",
    DARK = "dark",
}

const colorMap = {
    [TextColors.NEUTRAL]: "text-neutral-0",
    [TextColors.DARK]: "text-neutral-900",
};

function Text({ content, color }) {
    const textClass = cn("font-mazzard text-base", colorMap[color]);

    return <span className={textClass}>{content}</span>;
}

Text.propTypes = {
    content: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(TextColors)),
};

Text.defaultProps = {
    content: "text",
    color: TextColors.NEUTRAL,
};

export default Text;
