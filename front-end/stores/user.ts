import { defineStore } from 'pinia'
import { ref } from 'vue'
import type { User } from '@/types/user'

export const useUserStore = defineStore('user', () => {
    const user = ref<User | null>(null)
    const token = ref<string | null>()

    const setUser = (newUser: User) => {
        console.log('Setting user', newUser)
        user.value = newUser
    }

    const setToken = (newToken: string) => {
        const tokenConfig = useCookie('token')
        tokenConfig.value = newToken
        token.value = tokenConfig.value
    }

    const logout = () => {
        user.value = null
        token.value = null
    }

    const fetchUser = async () => {
        // Fetch user from API
        const response = await fetch('http://localhost:8000/api/user', {
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token.value || '',
            }
        })

        if (response.ok) {
            const data = await response.json()
            setUser(data)
        }
    }

    const isLogged = () => {
        return user.value !== null && token.value !== null
    }

    return { user, token, setUser, setToken, fetchUser, logout, isLogged }
})
