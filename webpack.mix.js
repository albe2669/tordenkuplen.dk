const mix = require('laravel-mix');
const path = require('path');
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

mix
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/import.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .scripts([
        'public/js/import/jquery-1.12.1.min.js',
        'public/js/import/owl.carousel.min.js',
        'public/js/import/slick.min.js',
        'public/js/import/jquery.nice-select.min.js',
        'public/js/import/custom.js',
    ], 'public/js/all.js')
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import'],
    })
    .sourceMaps();
