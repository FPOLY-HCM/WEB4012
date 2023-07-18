import aspectRatio from '@tailwindcss/aspect-ratio'

/** @type {import('tailwindcss').Config} */
export default {
    content: ['./resources/**/*.blade.php', './resources/**/*.js'],
    theme: {
        extend: {},
    },
    plugins: [
        aspectRatio,
    ],
}
