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
    .setResourceRoot('../') // Fix UAT-environment path resolve issue
    .js('resources/js/app.js', 'public/js')
    .sourceMaps()
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])
    .browserSync({
        host: '192.168.10.10', // Important: Use Vagrant Box Private IP, See Vagrantfile
        proxy: 'eleanor-website.local.alles.hosting',
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
