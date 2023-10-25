import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import ui from '@headlessui/tailwindcss';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        colors: {
            'beige': '#FCF1DD',
            'black': '#000000',
            'gray': {
                dark: '#252525',
                DEFAULT: '#625F5F',
                light: '#ABABAB',
            },
            'white': '#FFFFFF',
            'pink': '#F5CEE9',
            'blue': '#322FCD',
            'red': '#CD2F38',
        },
        container: {
            center: true,
            padding: '1.5rem',
        },
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['FivoSansModern'],
            },
        },
    },

    plugins: [
        forms,
        ui,
    ],
};
