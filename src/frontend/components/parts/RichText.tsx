import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum TextAreaColors {
    NEUTRAL = "neutral",
    DARK = "dark",
}

const colorMap = {
    [TextAreaColors.NEUTRAL]: "text-neutral-0",
    [TextAreaColors.DARK]: "text-neutral-900",
};

function RichText({ html, color }) {
    const richTextClass = cn("font-mazzard text-base", colorMap[color]);

    return (
        <div
            dangerouslySetInnerHTML={{ __html: html }}
            className={richTextClass}
        />
    );
}

RichText.propTypes = {
    html: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(TextAreaColors)),
};

RichText.defaultProps = {
    html: "richText",
    color: TextAreaColors.NEUTRAL,
};

export default RichText;
