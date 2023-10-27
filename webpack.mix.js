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

mix
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
        host: 'laravel-cms-v3.local.alles.onl',
        proxy: {
            target: 'http://localhost:8080',
            middleware: function (req, res, next) {
                res.setHeader('Access-Control-Allow-Origin', '*');
                next();
            }
        },
        files: ["./resources/**/*.{js,jsx,css,blade.php}"],
        reloadDelay: 250,
        port: 8080,
        injectChanges: true,
        watch: true,
        reload: true,
        open: false,
        notify: true,
        watchOptions: {
            usePolling: true,
            interval: 250,
        }
    });

if (mix.inProduction()) {
    mix.version();
}
