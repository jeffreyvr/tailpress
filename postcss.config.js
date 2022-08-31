module.exports = {
    plugins: [
        require('postcss-nested-ancestors'),
        require('postcss-nested'),
        require('postcss-import'),
        require('tailwindcss/nesting'),
        require('tailwindcss')
    ]
}
