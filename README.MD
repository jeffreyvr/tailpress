<p><img src="http://tailpress.io/images/logo.svg" width="200" alt="TailPress"></p>

# Introduction
TailPress is a minimal boilerplate theme for WordPress using [TailwindCSS](https://tailwindcss.com/), with [PostCSS](https://postcss.org) and [Laravel Mix](https://laravel-mix.com/).

## Getting started

### Regular method

* Clone repo `git clone https://github.com/jeffreyvr/tailpress.git && cd tailpress`
* Run `rm -rf .git` to remove git (or `rmdir .git` for Windows)
* Run `npm install`
* Run `npx mix`
* Run `npx mix watch` to start developing

### Using the installer

You can also get started using the installer:

```bash
composer global require jeffreyvanrossum/tailpress-installer

tailpress new example-theme
```

You can optionally set the theme name. This will also replace all occurences of the word TailPress:

```bash
tailpress new example-theme --name="Example Theme"
```

You can also initialize a new Git repository (branch defaults to `main`):

```bash
tailpress new example-theme --name="Example Theme" --git --branch="main"
```

Once your theme is ready, don't forget to cd into the directory.

You will be asked if you would like to have WordPress installed as well. Keep in mind that you still need a local development environment for PHP and MySQL.

### General

You will find the editable CSS and Javascript files within the `/resources` folder.

Before you use your theme in production, make sure you run `npx mix --production`.

## Block editor support
TailPress comes with basic support for the [block editor](https://wordpress.org/support/article/wordpress-editor/).

A basic setup for `theme.json` is included. This also means that you need to at least use WordPress 5.8. If you wan't to support earlier WordPress versions, you can use an older version of TailPress instead.

CSS-classes for alignment (full, wide etc.) are generated automatically. You can opt-out on this by removing the plugin from the `tailwind.config.js` file.

To make the editing experience within the block editor more in line with the front end styling, a `editor-style.css` is generated.

### Define theme colors and font sizes
Several colors and font sizes are defined from the beginning. You can modify the colors in `theme.json`.

## JIT
[Tailwind CSS JIT](https://tailwindcss.com/docs/just-in-time-mode#enabling-jit-mode) is used to allow for fast compiling.

## PurgeCSS
By default, PurgeCSS is enabled. You can modify or disable it by changing the settings in the `tailwind.config.js` file. There are several [PurgeCSS options](https://tailwindcss.com/docs/optimizing-for-production#purge-css-options).

## Theme subfolder
To better organize the theme and allow for easier purging, a subfolder called `theme` is created. Here you will find the template files like `header.php`, `footer.php`, `single.php`.

To make this work a additional class has been created and placed within the `includes` folder. If you don't like this setup, you can of course still use previous versions of TailPress instead.

## Links
* [TailPress website](https://tailpress.io)
* [Screencasts](https://www.youtube.com/playlist?list=PL6GBdOp044SHIOSCZejodwr1HcYsC43wG)
* [TailwindCSS Documentation](https://tailwindcss.com/docs)
* [Laravel Mix Documentation](https://laravel-mix.com/docs)

## Contributors
* [Jeffrey van Rossum](https://github.com/jeffreyvr)
* [All contributors](https://github.com/jeffreyvr/tailpress/graphs/contributors)

## License
MIT. Please see the [License File](/LICENSE) for more information.