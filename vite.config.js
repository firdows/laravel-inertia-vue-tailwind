import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import { defineConfig } from 'vite';
// import eslintPlugin from 'vite-plugin-eslint';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        // eslintPlugin({
        //     // การตั้งค่าของ ESLint Plugin (ไม่บังคับ)
        //     include: ['resources/**/*.js', 'resources/**/*.vue'], // ตรวจเฉพาะไฟล์ .js และ .vue ในโฟลเดอร์ src
        // }),
    ],
    resolve: {
        alias: {
            ziggy: path.resolve("vendor/tightenco/ziggy/dist/index.esm.js"),
        },
    },
});
