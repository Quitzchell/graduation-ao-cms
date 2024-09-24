import React from "react";

const components = {
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
