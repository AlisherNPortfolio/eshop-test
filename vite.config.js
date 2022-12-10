import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                // 'resources/css/bootstrap.min.css',
                'resources/js/app.js',
                // 'resources/js/jquery.js',
                // 'resources/js/popper.min.js',
                // 'resources/js/bootstrap.min.js',
            ],
            refresh: true,
        }),
    ],
});