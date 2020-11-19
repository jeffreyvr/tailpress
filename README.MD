# TailPress
A minimal boilerplate theme for WordPress using [TailwindCSS](https://tailwindcss.com/) and [Laravel Mix](https://laravel-mix.com/).

## Getting started
* Clone repo
* Run `npm install`
* Run `npm run dev`
* Run `npm run watch` to start developing

## Links
* [TailwindCSS Documentation](https://tailwindcss.com/docs)
* [Laravel Mix Documentation](https://laravel-mix.com/docs)

## PurgeCSS
By default, PurgeCSS is enabled. You can modify or disable it by changing the settings in the `tailwind.js` file. There are several [PurgeCSS options](https://tailwindcss.com/docs/optimizing-for-production#purge-css-options).

## NPM
If you run into dependency resolving issues, it might be due to [#2562](https://github.com/JeffreyWay/laravel-mix/issues/2562).

If that is the case try to run:

```
npm install --legacy-peer-deps
```
