const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.react('resources/js/app.js', 'public/js');
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        tailwindcss('./tailwind.config.js'),
    ]);
    