const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
<<<<<<< HEAD
 | for your Laravel application. By default, we are compiling the Sass
=======
 | for your Laravel applications. By default, we are compiling the CSS
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
<<<<<<< HEAD
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
=======
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
>>>>>>> b541f1feb320e7ca57cfc9851f3ac4a74d946dc2
