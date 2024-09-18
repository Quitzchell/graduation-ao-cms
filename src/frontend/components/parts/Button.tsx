import PropTypes from "prop-types";

import { cn } from "@/lib/utils";

export enum Variants {
    SOLID = "solid",
    OUTLINE = "outline",
}

export enum Colors {
    RED = "red",
    GREEN = "green",
    DARK_GREEN = "darkgreen",
    BLUE = "blue",
    YELLOW = "yellow",
    PURPLE = "purple",
    TEAL = "teal",
}

const variants = {
    solid: {
        red: "bg-red-300 hover:bg-red-400 text-neutral-0",
        green: "bg-green-300 hover:bg-green-400 text-neutral-0",
        darkgreen: "bg-darkgreen-200 hover:bg-darkgreen-500 text-neutral-0",
        blue: "bg-blue-300 hover:bg-blue-400 text-neutral-0",
        yellow: "bg-yellow-200 hover:bg-yellow-500 text-neutral-0",
        purple: "bg-purple-200 hover:bg-purple-500 text-neutral-0",
        teal: "bg-teal-300 hover:bg-teal-400 text-neutral-0",
    },
    outline: {
        red: "border-red-300 hover:bg-red-50 text-red-300 border",
        green: "border-green-300 hover:bg-green-50 text-green-300 border",
        darkgreen: "border-darkgreen-200 hover:bg-darkgreen-50 text-darkgreen-200 border",
        blue: "border-blue-400 hover:bg-blue-50 text-blue-400 border",
        yellow: "border-yellow-400 hover:bg-yellow-50 text-yellow-400 border",
        purple: "border-purple-300 hover:bg-purple-50 text-purple-300 border",
        teal: "border-teal-300 hover:bg-teal-50 text-teal-300 border",
    },
};

const Button = ({ label, color, variant }) => {
    const buttonClass = cn(
        "px-6 py-2 rounded inline-flex justify-center items-center font-bold text-base leading-normal font-mazzard",
        variants[variant][color],
    );

    return <button className={buttonClass}>{label}</button>;
};

Button.propTypes = {
    label: PropTypes.string.isRequired,
    color: PropTypes.oneOf(Object.values(Colors)),
    variant: PropTypes.oneOf(Object.values(Variants)),
};

Button.defaultProps = {
    color: Colors.RED,
    variant: Variants.SOLID,
};

export default Button;
