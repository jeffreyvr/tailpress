const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
// const tailpress = require('./tailpress');

module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            fontFamily: {
                sans: ['IBM Plex Sans', 'sans-serif'],
                'open-sans-condensed': ['"Open Sans Condensed"', 'sans-serif'],
            },

        },
        screens: {
            xs: '480px',
            sm: '600px',
            md: '782px',
            lg: tailpress.theme('settings.layout.contentSize', theme),
            xl: tailpress.theme('settings.layout.wideSize', theme),
            '2xl': '1440px'
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
        tailpress.tailwind
    ]
};

