import { defineStore } from 'pinia'
import type { User } from "~/types/user";

export const userStore = defineStore('user', () => {
    const user = ref<User | null>(null)
    const setUser = (newUser: User) => {
        user.value = newUser
    }

    return { user, setUser }
})