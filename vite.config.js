import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import viteImagemin from 'vite-plugin-imagemin';

const path = require('path')


export default defineConfig({
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },

    plugins: [
        laravel({
            input: [
                '/resources/scss/app.scss',
                '/resources/js/app.js',
            ],
            refresh: true,
        }),

        viteImagemin({
            gifsicle: {
                optimizationLevel: 7,
                interlaced: false,
            },
            optipng: {
                optimizationLevel: 7,
            },
            mozjpeg: {
                quality: 20,
            },
            pngquant: {
                quality: [0.8, 0.9],
                speed: 4,
            },
            svgo: {
                plugins: [
                    {
                        name: 'removeViewBox',
                    },
                    {
                        name: 'removeEmptyAttrs',
                        active: false,
                    },
                ],
            },
        }),
    ],


});