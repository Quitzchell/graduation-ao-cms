import type { Config } from "tailwindcss";

const config: Config = {
    content: [
        "./pages/**/*.{js,ts,jsx,tsx,mdx}",
        "./components/**/*.{js,ts,jsx,tsx,mdx}",
        "./app/**/*.{js,ts,jsx,tsx,mdx}",
    ],
    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
            red: {
                DEFAULT: "#E30A1B",
                50: "#fce7e8",
                75: "#f49ba2",
                100: "#ef717b",
                200: "#e83442",
                300: "#e30a1b",
                400: "#9f0713",
                500: "#8a0610",
            },
            green: {
                DEFAULT: "#019278",
                50: "#e6f4f2",
                63: "#cbe8e3",
                75: "#97d2c8",
                100: "#6cc0b1",
                200: "#2ca58f",
                300: "#019278",
                400: "#016654",
                500: "#015949",
            },
            blue: {
                DEFAULT: "#2c4f9e",
                50: "#eaedf5",
                60: "#d8dfed",
                75: "#a8b7d7",
                100: "#8599c7",
                200: "#506dae",
                300: "#2c4f9e",
                400: "#1f376f",
                500: "#1b3060",
            },
            yellow: {
                DEFAULT: "#faaf01",
                50: "#fff7e6",
                75: "#fdde97",
                100: "#fcd16c",
                200: "#fbbd2c",
                300: "#faaf01",
                400: "#af7a01",
                500: "#996b01",
            },
            purple: {
                DEFAULT: "#350d39",
                50: "#ebe7eb",
                75: "#ac9cae",
                100: "#8a738c",
                200: "#57365b",
                300: "#350d39",
                400: "#250928",
                500: "#200823",
            },
            darkgreen: {
                DEFAULT: "#013033",
                50: "#e6eaeb",
                75: "#97aaab",
                100: "#6c8789",
                200: "#2C5356",
                300: "#013033",
                400: "#012224",
                500: "#011d1f",
            },
            teal: {
                DEFAULT: "#6695a2",
                50: "#f0f4f6",
                63: "#dae4e7",
                75: "#c0d4d9",
                100: "#a6c2c9",
                200: "#80a7b2",
                300: "#6695a2",
                400: "#476871",
                500: "#3e5b63",
            },
            neutral: {
                DEFAULT: "#575757",
                0: "#ffffff",
                10: "#fafafa",
                20: "#f5f5f5",
                30: "#ebebeb",
                40: "#dedede",
                50: "#bfbfbf",
                60: "#b0b0b0",
                70: "#a3a3a3",
                80: "#949494",
                90: "#858585",
                100: "#757575",
                200: "#666666",
                300: "#575757",
                400: "#4a4a4a",
                500: "#3b3b3b",
                600: "#2e2e2e",
                700: "#1c1c1c",
                800: "#0d0d0d",
                900: "#000000",
            },
        },
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
        extend: {
            fontFamily: {
                mazzard: ["'Mazzard H'", "sans-serif"],
                luckyfellas: ["'Lucky Fellas'", "cursive"],
            },
            fontSize: {
                xs: ["0.75rem", "1rem"],
                sm: ["0.875rem", "1.25rem"],
                base: ["1rem", "1.5rem"],
                lg: ["1.125rem", "1.75rem"],
                xl: ["1.25rem", "1.75rem"],
                "2xl": ["1.5rem", "2rem"],
                "3xl": ["1.875rem", "2.25rem"],
                "4xl": ["2.25rem", "2.5rem"],
                "5xl": ["3rem", "3rem"],
                "6xl": ["3.75rem", "3.75rem"],
                "7xl": ["4.5rem", "4.5rem"],
                "8xl": ["6rem", "6rem"],
                "9xl": ["8rem", "8rem"],
            },

            fontWeight: {
                bold: "700",
            },
        },
    },
    plugins: [],
};
export default config;