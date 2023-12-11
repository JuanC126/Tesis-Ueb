const mix = require('laravel-mix');

mix
    .sass('resources/css/app.scss', 'public/css')
    .sass('resources/css/header.css', 'public/css'); // Agrega esta línea
