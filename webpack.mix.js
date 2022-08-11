const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setResourceRoot(process.env.MIX_RESOURCE_ROOT ?? "/")
    .js("resources/js/app.js", "public/js")
    .extract([
        "@tailwindcss/aspect-ratio",
        "@tailwindcss/forms",
        "@tailwindcss/typography",
        "autoprefixer",
        "axios",
        "lodash",
        "tailwindcss",
        "swiper",
    ])
    .sourceMaps()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .browserSync({
        proxy: "localhost:8080",
        files: ["./resources/**/*.{js,jsx,css,blade.php}"],
        reloadDelay: 250,
        port: 8081,
        injectChanges: true,
        watch: true,
        reload: true,
        open: false,
        notify: true,
        watchOptions: {
            usePolling: true,
            interval: 250,
        },
        socket: {
            domain: process.env.MIX_URL ?? "localhost:8081", // Should be the exposed port by docker to reach the webpack dev server (check the .env.example)
        },
    });

if (mix.inProduction()) {
    mix.version();
}
