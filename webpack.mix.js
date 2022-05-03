const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/alpine.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
