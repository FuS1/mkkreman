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

mix.js(
    [
        "resources/views/AdminPage/js/app.js",
    ], 
    "public/AdminPage/js"
)
.version();

mix.postCss(
    "resources/views/AdminPage/css/app.css", 
    "public/AdminPage/css", 
    [
        'tailwindcss',
    ]
)
.version();

mix.copy("resources/views/AdminPage/img","public/AdminPage/img").version();

mix.copy("resources/views/FrontPage/lib","public/FrontPage/public");
mix.copy("resources/views/FrontPage/public","public/FrontPage/public");
mix.copy("resources/views/lib","public/lib");
mix.copy("node_modules/flowbite/dist","public/lib/flowbite");
mix.copy("node_modules/tinymce","public/lib/tinymce");
mix.copy("node_modules/tinymce-langs/langs","public/lib/tinymce/langs");
