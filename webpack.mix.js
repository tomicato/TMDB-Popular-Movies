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

/*mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css');*/

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

mix.scripts([
    'resources/js/auth/jquery-3.5.1.slim.min.js',
    'resources/js/auth/popper.min.js',
    'resources/js/auth/bootstrap.min.js',
], 'public/js/auth/scripts.js');

mix.styles([
    'resources/auth/login.css',
], 'public/css/auth/style.css');

//mix.copy('resources/fonts', 'public/fonts');
mix.copy('resources/images', 'public/img');

