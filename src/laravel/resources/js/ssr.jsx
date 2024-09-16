import ReactDOMServer from "react-dom/server";
import { createInertiaApp } from "@inertiajs/react";
import createServer from "@inertiajs/react/server";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import route from "../../vendor/tightenco/ziggy/dist/index.m";
import { StrictMode } from "react";

const appName = import.meta.env.VITE_APP_NAME || "Inertia Boilerplate";

createServer((page) =>
  createInertiaApp({
    page,
    render: ReactDOMServer.renderToString,
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
      resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob("./Pages/**/*.jsx")),
    setup: ({ App, props }) => {
      const Ziggy = {
        ...props.initialPage.props.ziggy,
        location: new URL(props.initialPage.props.ziggy.url),
      };

      global.route = (name, params, absolute, config = Ziggy) =>
        route(name, params, absolute, config);

      return (
        <StrictMode>
          <App {...props} />
        </StrictMode>
      );
    },
  }),
);
