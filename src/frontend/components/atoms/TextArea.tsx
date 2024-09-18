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

function TextArea({ text, color }) {
    const textAreaClass = cn("font-mazzard text-base", colorMap[color]);

    return (
        <div
            dangerouslySetInnerHTML={{ __html: text }}
            className={textAreaClass}
        />
    );
}

TextArea.propTypes = {
    text: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(TextAreaColors)),
};

TextArea.defaultProps = {
    text: "text",
    color: TextAreaColors.NEUTRAL,
};

export default TextArea;
