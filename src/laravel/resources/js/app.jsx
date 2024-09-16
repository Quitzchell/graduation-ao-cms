import "./bootstrap";
import "../css/app.css";

import { StrictMode } from "react";

import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createRoot, hydrateRoot } from "react-dom/client";

const appName = import.meta.env.VITE_APP_NAME || "Inertia Boilerplate";
const appDevMode = import.meta.env.DEV || false;

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob("./Pages/**/*.jsx")),
    setup({ el, App, props }) {
        if (appDevMode) {
            createRoot(el).render(
                <StrictMode>
                    <App {...props} />
                </StrictMode>,
            );
        } else {
            hydrateRoot(
                el,
                <StrictMode>
                    <App {...props} />
                </StrictMode>,
            );
        }
    },
    progress: {
        color: "#4B5563",
    },
});
