import type { Repository } from "~/types/repository";
import { defineStore } from 'pinia'
import { type DetailedCommit, type Commit } from "~/types/commit";

export const useRepositoryStore = defineStore('repository', () => {
    // Pegar a url com base no ambiente no .env
    const api = useRuntimeConfig().appEnv === 'production' ? 'https://162.243.166.199/api/' : 'http://localhost:8000/api/'
    const repositories = ref<Repository[]>([])
    const repository = ref<Repository | null>(null)
    const loading = ref(false)
    const error = ref<any>(null)
    const commits = ref<Commit| null>(null)
    const recentCommits = ref<DetailedCommit[]>([])

    const fetchRepositories = async (token: string) => {
        loading.value = true
        try {
            const response = await fetch(`${api}repositories`, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json',
                }
            })
            repositories.value = await response.json()
        } catch (err) {
            console.error(err)
            error.value = err
        } finally {
            loading.value = false
        }
    }

    const syncRepositories = async (token: string) => {
        console.log("Token: ", token)
        loading.value = true
        try {
            const response = await fetch(`${api}repositories/sync`, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json',
                }
            })
            const json = await response.json()
            repositories.value = json.repositories
        } catch (err) {
            console.error(err)
            error.value = err
        } finally {
            loading.value = false
        }
    }

    const fetchRepository = async (id: string, token: string) => {
        loading.value = true
        try {
            const response = await fetch(`${api}repositories/${id}`, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json',
                }
            })
            const repo = await response.json()
            repository.value = {
                ...repo,
                stargazers_count: repo.stargazers_count.toString(),
                open_issues_count: repo.open_issues_count.toString(),
                pull_requests_count: repo.pull_requests_count.toString()
            }
            await fetchCommits(id, token)
            // Pegar os 4 commits mais recentes
            recentCommits.value = repo.commits.slice(0, 4)
        } catch (err) {
            console.error(err)
            error.value = err
        } finally {
            loading.value = false
        }
    }

    const fetchCommits = async (id: string, token: string) => {
        loading.value = true
        try {
            const response = await fetch(`${api}repositories/${id}/commits`, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json',
                }
            })
            commits.value = await response.json()
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
            value: repo.id.toString(),
            label: repo.name
        }))
    });

    return {
        repositories,
        repository,
        commits,
        recentCommits,
        repositoriesOptions,
        loading,
        error,
        fetchRepositories,
        syncRepositories,
        fetchRepository,
        fetchCommits
    }
})