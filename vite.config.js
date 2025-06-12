import { defineConfig } from 'vite'
import * as path from 'path'
import sassGlobImports from 'vite-plugin-sass-glob-import';
import eslint from 'vite-plugin-eslint';
import symfonyPlugin from "vite-plugin-symfony";
import commonjs from "vite-plugin-commonjs";

// https://vite.dev/config/
export default defineConfig(({ command }) =>{
	return{
		plugins: [
			commonjs(),
			symfonyPlugin(),
			sassGlobImports(),
			eslint({
				cwd: process.cwd(),
				exclude: [/node_modules/]
			}),
			{
				name: 'twig',
				handleHotUpdate({ file, server }) {
					if (file.endsWith('.twig')) {
						server.ws.send({ type: 'full-reload' });
					}
				},
			},
		],
		resolve: {
			alias:[
				{ find: '@', replacement: path.resolve(__dirname, 'assets') },
			]
		},
		base: '/build',
		css: {
			devSourcemap: true,
			preprocessorOptions: {
				scss: {
					api: 'modern',
					silenceDeprecations: ['import'],
				},
			},
		},
		server:{
			host: 'localhost',
			strictPort: true,
			port: 8080,
			cors: { origin: '*' },
		},
		build: {
			target: 'esnext',
			manifest: true,
			copyPublicDir: false,
			assetsDir: '',
			outDir: './public/build',
			emptyOutDir: true,
			rollupOptions: {
				input: {
					app: './assets/js/app.js',
					style: './assets/css/style.scss',
					print: './assets/css/print.scss',
					style_editor: './assets/css/style-editor.scss'
				}
			}
		}
	}
})
