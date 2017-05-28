const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .less('resources/assets/less/styles.less', 'public/css')
 // .version()
mix.copyDirectory('resources/assets/vendor', 'public/vendor');
mix.copyDirectory('resources/assets/img', 'public/images');
