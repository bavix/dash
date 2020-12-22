const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue({
    extractStyles: true,
});

mix.sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig(webpack => {
    return {
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.esm-browser.prod.js',
                'sweetalert2$': 'sweetalert2/dist/sweetalert2.js',
            }
        }
    };
});

mix.extract(['vue', 'vuex', 'axios', 'sweetalert2']);

if (mix.inProduction()) {
    mix.version();
}
