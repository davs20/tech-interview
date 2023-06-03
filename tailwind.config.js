const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
const FormKitVariants = require('@formkit/themes/tailwindcss')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/@formkit/themes/dist/tailwindcss/genesis/index.cjs'
    ],

    theme: {

        extend: {

            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                black: colors.black,
                red: colors.red,
                white: colors.white,
                gray: colors.gray,
                emerald: colors.emerald,
                indigo: colors.indigo,
                yellow: colors.yellow,
            },
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        FormKitVariants],
};
