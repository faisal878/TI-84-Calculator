import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['inter', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'btn-hover': 'linear-gradient(180deg, #10b981 0%, #034737 100%)',
            },
            boxShadow: {
                // 'custom-green': '0 5px 25px 0 rgba(3, 71, 55, 0.1)',
                'custom-soft': '0px 5px 20px 0px rgba(114, 114, 255, 0.15)',
            },
        },
    },

    plugins: [forms, typography],
};
