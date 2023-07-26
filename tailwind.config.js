import preset from './vendor/filament/support/tailwind.config.preset'
import aspectRatio from '@tailwindcss/aspect-ratio'
import typography from '@tailwindcss/typography'

export default {
    presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    plugins: [aspectRatio, typography]
}
