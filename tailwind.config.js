const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
        fontSize: {
            sm: '0.8rem',
            base: '1rem',
            xl: '1.25rem',
            '2xl': '1.563rem',
            '3xl': '1.953rem',
            '4xl': '2.441rem',
            '5xl': '3.052rem',
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
