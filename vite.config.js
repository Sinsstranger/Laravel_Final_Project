import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
//import laravel from 'vite-plugin-externalize-dependencies';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/bootstrap.min.css',
                'resources/css/open-iconic-bootstrap.min.css',
                'resources/css/animate.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/owl.theme.default.min.css',
                'resources/css/magnific-popup.css',
                'resources/css/aos.css',
                'resources/css/ionicons.min.css',
                'resources/css/flaticon.css',
                'resources/css/icomoon.css',
                'resources/css/style.css',
                'resources/css/app.css',
                'resources/css/bootstrap.min.css',
                'resources/js/jquery.min.js',
                'resources/js/jquery-migrate-3.0.1.min.js',
                'resources/js/popper.min.js',
                'resources/js/bootstrap.js',
                'resources/js/jquery.easing.1.3.js',
                'resources/js/jquery.waypoints.min.js',
                'resources/js/jquery.stellar.min.js',
                'resources/js/owl.carousel.min.js',
                'resources/js/jquery.magnific-popup.min.js',
                'resources/js/aos.js',
                'resources/js/jquery.animateNumber.min.js',
                'resources/js/scrollax.min.js',
                'resources/js/main.js',
                'resources/js/app.js',
                'resources/js/vue.js',
                'resources/css/table.css'
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
