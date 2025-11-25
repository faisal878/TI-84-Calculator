import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 'resources/css/admin.css', 'resources/js/admin.js',
                'resources/css/admin.css', 
                'resources/js/admin.js',
            ],
            // ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue(),
    ],
});
