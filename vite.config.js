import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import Dropzone from "dropzone";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // refresh: true,
        }),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
            'Dropzone': 'Dropzone'
            //'select2': 'select2'
        },
    },
});
