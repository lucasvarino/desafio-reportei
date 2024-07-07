// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: ["@nuxtjs/tailwindcss", "shadcn-nuxt", "@nuxt/image", "@vueuse/nuxt", "@pinia/nuxt"],
  shadcn: {
    prefix: '',
    componentDir: './components/ui'
  },
  plugins: ["~/plugins/initializeAuth.ts"],
  app: {
    pageTransition: { name: 'page', mode: 'out-in' },
    head: {
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
    }
  },
  runtimeConfig: {
    appEnv: process.env.APP_ENV || 'development',
  }
})