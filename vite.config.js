import { defineConfig, loadEnv } from 'vite'
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import svgr from "vite-plugin-svgr";

export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), '')
    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.jsx'],
                ssr: 'resources/js/ssr.jsx',
                refresh: true,
            }),
            react(),
            svgr(),
        ],
        server: {
            hmr: {
                protocol: 'wss',
                host: env.APP_URL.replace('https://', '')
            },
            host: true,
            https: false,
            port: 8081,
            strictPort: true
        }
    }
});
