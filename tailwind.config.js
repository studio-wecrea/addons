const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        screens:{
            sm: '576px',
            md: '768px',
            lg:'992px',
            xl:'1200px',
        },
        container:{
            center: true,
            padding: '1rem',
        },
        extend: {
            
            fontFamily: {
                poppins: "'Poppins', sans-serif",
                roboto: "'Roboto', sans-serif;",
            },
            colors:{
                'primary': '#EAB308'
            }
        },
    },
    variants: {
        extend: {
            display: ['group-hover'],
            visibility: ['group-hover'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
