import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                'resources/css/app.css',
                'resources/css/animate.css',
                'resources/css/bootstrap.min.css',
                'resources/css/font-awesome.min.css',
                'resources/css/main.css',
                'resources/css/prettyPhoto.css',
                'resources/css/price-range.css',
                'resources/css/responsive.css',
                // JS
                'resources/js/app.js',
                'resources/js/jquery.js',
                'resources/js/jquery.prettyPhoto.js',
                'resources/js/jquery.scrollUp.min.js',
                'resources/js/bootstrap.min.js',
                'resources/js/main.js',
                'resources/js/contact.js',
                'resources/js/gmaps.js',
                'resources/js/html5shiv.js',
                'resources/js/price-range.js',
            ],
            refresh: true,
        }),
    ],
});