/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                cairo: ['Cairo', 'sans-serif'],
            },
            colors: {
                brand: {
                    DEFAULT: '#E8372C',
                    dark:    '#C0291F',
                },
                dark:    '#111827',
                surface: '#F8F9FC',
            },
        },
    },
    plugins: [],
};
