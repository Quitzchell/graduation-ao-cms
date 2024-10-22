import React from "react";

import CallToAction from "@/blocks/common/CallToAction";
import ImageContent from "@/blocks/common/Image";
import Map from "@/blocks/common/Map"
import Paragraph from "@/blocks/common/Paragraph"

const components = {
    "Common\\Paragraph": Paragraph,
    "Common\\Image": ImageContent,
    "Common\\CallToAction": CallToAction,
    "Common\\Map": Map
};

function renderBlockComponent(block, props = {}) {
    if (!components[block._template]) {
        console.warn(`${block._template} doesn't exist`);
        return "";
    }

    return React.createElement(components[block._template], {
        key: block._identifier,
        ...block.data,
        ...props,
    });
}

function Blocks({ blocks }) {
    return <>{blocks.map((block) => renderBlockComponent(block))}</>;
}

export default Blocks;
export { renderBlockComponent };
