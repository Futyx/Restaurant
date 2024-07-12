import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                shabnam: ['Shabnam']
            },
            boxShadow: {
                neon: "0 0 5px theme('colors.purple.200'), 0 0 20px theme('colors.purple.700')"
            },
            
        },
    },


    plugins: [forms],
};
