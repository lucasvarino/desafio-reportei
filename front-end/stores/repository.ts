import type { Repository } from "~/types/repository";
import { defineStore } from 'pinia'

export const useRepositoryStore = defineStore('repository', () => {
    const repositories = ref<Repository[]>([])
    const repository = ref<Repository | null>(null)
    const loading = ref(false)
    const error = ref<any>(null)

    const fetchRepositories = async () => {
        loading.value = true
        try {
            const response = await fetch('') //TODO: inserir url da API
            repositories.value = await response.json()
        } catch (err) {
            console.error(err)
            error.value = err
        } finally {
            loading.value = false
        }
    }

    const fetchRepository = async (name: string) => {
        loading.value = true
        try {
            const response = await fetch(``) //TODO: inserir url da API
            repository.value = await response.json()
        } catch (err) {
            console.error(err)
            error.value = err
        } finally {
            loading.value = false
        }
    }

    // Computed state for select component
    const repositoriesOptions = computed(() => {
        return repositories.value.map((repo) => ({
            value: repo.id,
            label: repo.name
        }))
    });

    return {
        repositories,
        repository,
        repositoriesOptions,
        loading,
        error,
        fetchRepositories,
        fetchRepository
    }
})