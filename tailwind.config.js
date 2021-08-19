const plugin = require('tailwindcss/plugin');
const _ = require("lodash");
const theme = require('./theme.json');

function tailpress(path) {
    let object = theme;
    return path.split('.').reduce(function(previous, current) {
        return previous ? previous[current] : null
    }, object || self);
}

function tailpress_map_colors(colors) {
    let result = {};

    colors.forEach(function(color) {
        result[''+color.slug+''] = color.color;
    });

    return result;
}

module.exports = {
    mode: 'jit',
    purge: {
        content: [
            './template-parts/*.php',
            './resources/css/*.css',
            './resources/js/*.js',
            './comments.php',
            './header.php',
            './footer.php',
            './single.php',
            './index.php',
            './404.php',
            './safelist.txt'
        ],
    },
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress_map_colors(tailpress('settings.color.palette'))
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': tailpress('settings.layout.wideSize')
        }
    },
    plugins: [
        plugin(function ({addUtilities, addComponents, e, prefix, config, theme}) {
            const colors = theme('colors');
            const margin = theme('margin');
            const screens = theme('screens');
            const fontSize = theme('fontSize');

            const alignmentUtilities = {
                '.alignfull': {
                    margin: `${margin[2] || '0.5rem'} calc(50% - 50vw)`,
                    maxWidth: '100vw',
                    "@apply w-screen": {}
                },
                '.alignwide': {
                    "@apply -mx-16 my-2 max-w-screen-xl": {}
                },
                '.alignnone': {
                    "@apply h-auto max-w-full mx-0": {}
                },
                ".aligncenter": {
                    margin: `${margin[2] || '0.5rem'} auto`,
                    "@apply block": {}
                },
                [`@media (min-width: ${screens.sm || '640px'})`]: {
                    '.alignleft:not(.wp-block-button)': {
                        marginRight: margin[2] || '0.5rem',
                        "@apply float-left": {}
                    },
                    '.alignright:not(.wp-block-button)': {
                        marginLeft: margin[2] || '0.5rem',
                        "@apply float-right": {}
                    },
                    ".wp-block-button.alignleft a": {
                        "@apply float-left mr-4": {},
                    },
                    ".wp-block-button.alignright a": {
                        "@apply float-right ml-4": {},
                    },
                },
            };

            const imageCaptions = {
                '.wp-caption': {
                    "@apply inline-block": {},
                    '& img': {
                        marginBottom: margin[2] || '0.5rem',
                        "@apply leading-none": {}
                    },
                },
                '.wp-caption-text': {
                    fontSize: (fontSize.sm && fontSize.sm[0]) || '0.9rem',
                    color: (colors.gray && colors.gray[600]) || '#718096',
                },
            };

            addUtilities([alignmentUtilities, imageCaptions], {
                respectPrefix: false,
                respectImportant: false,
            });
        }),
    ]
};
