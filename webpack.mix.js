const mix = require('laravel-mix');

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
    .setResourceRoot(process.env.MIX_RESOURCE_ROOT ?? '/') // Fix UAT-environment path resolve issue
    .js('resources/js/app.js', 'public/js')
    .extract([
        "@tailwindcss/aspect-ratio",
        "@tailwindcss/forms",
        "@tailwindcss/typography",
        "autoprefixer",
        "axios",
        "lodash",
        "tailwindcss",
    ])
    .sourceMaps()
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])
    .browserSync({
        proxy: 'localhost:8000', // TODO update to work with local docker setup
        files: ['./resources/**/*.{js,jsx,css,blade.php}'],
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
