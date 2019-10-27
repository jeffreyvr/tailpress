let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('resources/js/tailpress.js', 'js')
      .sass('resources/sass/tailpress.scss', 'css')
      .tailwind();