import { useUserStore } from '~/stores/user'

export default defineNuxtPlugin(async () => {
    const userStore = useUserStore()

    if (process.client && !userStore.user) {
        try {
            userStore.setToken(useCookie('token').value || '')
            await userStore.fetchUser()
        } catch (error) {
            console.error('Failed to fetch user data', error)
        }
    }
})