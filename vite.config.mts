import { defineConfig } from "vite";
import VitePluginBrowserSync from "vite-plugin-browser-sync";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  build: {
    manifest: true,
    assetsDir: "assets",
    outDir: `dist`,
    emptyOutDir: false, // Prevent deleting everything in theme root!
    sourcemap: true,
    rollupOptions: {
      input: {
        main: "assets/_js/index.ts",
        style: "assets/styles/style.css",
      },
      output: {
        entryFileNames: "[name].js",
        assetFileNames: "[name][extname]",
      },
    },
  },
  base: "",
  plugins: [
    tailwindcss(),
    VitePluginBrowserSync({
      buildWatch: {
        enable: true,
        bs: {
          proxy: "http://ankrom-moisan.local",
          files: ["assets/**/*", "js/**/*", "**/*.php"],
          watchEvents: ["change", "add", "unlink"],
          https: false,
          injectChanges: false,
          online: true,
          open: false,
        },
      },
    }),
  ],
});
