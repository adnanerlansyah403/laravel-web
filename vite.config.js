import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue";
import laravel from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    resolve: {
        alias: {
            '@/': `${path.resolve(__dirname, 'resources/js')}/`,
            '~/': `${path.resolve(__dirname, 'public')}/`
        }
    },
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
