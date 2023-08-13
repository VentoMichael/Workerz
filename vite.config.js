import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(['resources/css/app.css','resources/css/swiper.css', 'resources/js/app.js','resources/js/toggle.js', 'resources/js/filters.js', 'resources/js/faq.js'],
        ),
    ],

});
