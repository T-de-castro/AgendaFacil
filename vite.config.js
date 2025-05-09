import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

    export default defineConfig({
        plugins: [
            laravel({
                input: [
                    'resources/js/app.js',
                    'resources/scss/app.scss',
                    'resources/images/user2-160x160.jpg' // Opcional se quiser garantir o carregamento da imagem
                ],
                refresh: true,
            }),
        ],
    });
