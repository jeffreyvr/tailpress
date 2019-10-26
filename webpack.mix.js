let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('src/js/tailpress.js', 'assets/js')
      .sass('src/sass/tailpress.scss', 'assets/css')
      .tailwind();