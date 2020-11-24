let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.setPublicPath(path.resolve('./'))
    .js('resources/js/app.js', 'js')
    .sass('resources/sass/app.scss', 'css')
    .sass('resources/sass/editor-style.scss', 'editor-style.css')
    .tailwind()
    .version();
