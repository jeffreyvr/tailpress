# TailPress
A minimal boilerplate theme for WordPress using [TailwindCSS](https://tailwindcss.com/) and [Laravel Mix](https://laravel-mix.com/).

## Getting started
* Clone repo
* Run `npm install`
* Run `npm run development`
* Run `npm run watch` to start developing

## Block editor support
TailPress comes with basic support for the [block editor](https://wordpress.org/support/article/wordpress-editor/). 

CSS-classes for alignment, background and text colors will be generated automatically. You can modify this within the `tailwind.config.js` file. 

To make the editing experience within the block editor more in line with the front end styling, a `editor-style.css` is generated.

### Define theme colors

Four colors (primary, secondary, dark and light) are defined from the beginning.

You can modify the colors within the `colors` property in `tailpress.json`. 

### Define theme font sizes

You can modify the font sizes within the `fontSizes` property in `tailpress.json`.

## PurgeCSS
By default, PurgeCSS is enabled. You can modify or disable it by changing the settings in the `tailwind.config.js` file. There are several [PurgeCSS options](https://tailwindcss.com/docs/optimizing-for-production#purge-css-options).

## Links
* [TailwindCSS Documentation](https://tailwindcss.com/docs)
* [Laravel Mix Documentation](https://laravel-mix.com/docs)
