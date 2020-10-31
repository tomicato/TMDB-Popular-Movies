const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        // './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/auth/*.css',

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled', 'active', 'visited'],
    },

    plugins: [require('@tailwindcss/ui')],
};

