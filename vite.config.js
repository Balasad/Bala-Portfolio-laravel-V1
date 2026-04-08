import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**/*.blade.php',
                'resources/js/**/*.js',
                'app/**/*.php',
            ],
        }),
        tailwindcss(),
    ],
    server: {
        host: true,
        port: 5173,
        hmr: {
            host: 'localhost',
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    build: {
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
        rollupOptions: {
            output: {
                manualChunks: {
                    'aos': ['aos'],
                    'glightbox': ['glightbox'],
                },
            },
            // Image optimization - inline small images, optimize large ones
            assetFileNames: (assetInfo) => {
                if (assetInfo.name.endsWith('.png') || assetInfo.name.endsWith('.jpg') || assetInfo.name.endsWith('.jpeg')) {
                    return 'images/[name]-[hash][extname]';
                }
                return 'assets/[name]-[hash][extname]';
            },
        },
        cssMinify: true,
        reportCompressedSize: true,
        chunkSizeWarningLimit: 500,
        // Image optimization options
        assetsInlineLimit: 4096, // Inline images smaller than 4KB
    },
    // Asset handling
    assetsInclude: ['**/*.webp', '**/*.avif'],
});
