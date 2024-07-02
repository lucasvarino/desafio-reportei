import { useUserStore } from '~/stores/user'

export default defineNuxtPlugin(async () => {
    const userStore = useUserStore()
    const token = useCookie('token').value

    if (process.client && !userStore.user && token) {
        try {
            userStore.setToken(token)
            await userStore.fetchUser()
        } catch (error) {
            console.error('Failed to fetch user data', error)
        }
    }
})