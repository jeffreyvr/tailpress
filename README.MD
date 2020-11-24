# TailPress
A minimal boilerplate theme for WordPress using [TailwindCSS](https://tailwindcss.com/) and [Laravel Mix](https://laravel-mix.com/).

## Getting started
* Clone repo
* Run `npm install`
* Run `npm run dev`
* Run `npm run watch` to start developing

## Block editor support
Out of the box, TailPress comes with basic support for the [block editor](https://wordpress.org/support/article/wordpress-editor/). It will, for example, automatically generate alignment classes, text color classes and background color classes. You can modify this within the `tailwind.js` file. In addition, a `editor-style.css` will be generated and loaded within the block editor to make the editing experiences more in line with the front end styling. You can specify the editor style within `resources/sass/editor-style.scss`.

### Define theme colors

To get you started, four colors are set from the beginning. Being a primary, secondary, dark and light color.

You can define the colors within the `tailpress.colors` property in `tailwind.js`. Make sure to also define these colors within the `editor-color-palette` (`functions.php`).

### Define theme font sizes

You can define the font sizes within the `tailpress.fontSizes` property in `tailwind.js`. Make sure to also define these sizes within the `editor-font-sizes` (`functions.php`).

## PurgeCSS
By default, PurgeCSS is enabled. You can modify or disable it by changing the settings in the `tailwind.js` file. There are several [PurgeCSS options](https://tailwindcss.com/docs/optimizing-for-production#purge-css-options).

## NPM
If you run into dependency resolving issues, it might be due to [#2562](https://github.com/JeffreyWay/laravel-mix/issues/2562).

If that is the case try to run:

```
npm install --legacy-peer-deps
```

## Links
* [TailwindCSS Documentation](https://tailwindcss.com/docs)
* [Laravel Mix Documentation](https://laravel-mix.com/docs)