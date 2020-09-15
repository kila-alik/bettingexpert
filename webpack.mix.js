let mix = require('laravel-mix');

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

mix.scripts([
    'resources/assets/js/jquery-2.1.4.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/jquery.magnific-popup.min.js',
    'resources/assets/js/custom.js',
    'resources/assets/js/fonts.js',
    'resources/assets/js/index.js',
    'resources/assets/js/jquery.smooth-scroll.min.js',
    'resources/assets/js/jquery.countdown.min.js',
    'resources/assets/js/skrollr.js'
], 'public/js/app.js');

mix.styles([
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/index.css',
    'resources/assets/css/magnific-popup.css',
    'resources/assets/css/style.css',
    'resources/assets/css/custom.css',
    'resources/assets/css/icons.css'
], 'public/css/app.css');

mix.copy('resources/assets/css/p-404.css', 'public/css/p-404.css');