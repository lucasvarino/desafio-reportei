// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: ["@nuxtjs/tailwindcss", "shadcn-nuxt", "@nuxt/image", "@vueuse/nuxt", "@pinia/nuxt"],
  shadcn: {
    prefix: '',
    componentDir: './components/ui'
  },
  plugins: ["~/plugins/initializeAuth.ts", { src: "~/plugins/allow-http-requests.ts", mode: "client" }],
  app: {
    pageTransition: { name: 'page', mode: 'out-in' },
  },
  runtimeConfig: {
    appEnv: process.env.APP_ENV || 'development',
  }
})