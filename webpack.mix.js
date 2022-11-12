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

mix.js([
    "resources/views/AdminPage/js/app.js"
], "public/AdminPage/js");

mix.postCss("resources/views/AdminPage/css/app.css", "public/AdminPage/css", [
    'tailwindcss',
]);
    
mix.copy(
    "resources/views/AdminPage/img",
    "public/AdminPage/img"
)
