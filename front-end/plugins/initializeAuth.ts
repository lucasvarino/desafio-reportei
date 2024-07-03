import { useUserStore } from '~/stores/user'

export default defineNuxtPlugin(async () => {
    const userStore = useUserStore()
    const repositoryStore = useRepositoryStore()
    const token = useCookie('token').value

    if (process.client && !userStore.user && token) {
        try {
            userStore.setToken(token)
            await userStore.fetchUser()
            await repositoryStore.syncRepositories(token)
        } catch (error) {
            console.error('Failed to fetch user data', error)
        }
    }
})