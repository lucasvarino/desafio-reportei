<template>
  <div>
    <h1>Redirecting...</h1>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const userStore = useUserStore();
const repositoryStore = useRepositoryStore();

onMounted(async () => {
  const code = router.currentRoute.value.query.code
  if (code) {
    // Get request for token
    const response = await fetch(`https://api.lucasvarino.tech/api/auth/github/callback?code=${code}`, {
      credentials: 'include',
      method: 'GET',
      headers: new Headers({
        'Content-Type': 'application/json',

      }),
    })
    const data = await response.json()
    const { token, user } = data

    userStore.setUser(user)
    userStore.setToken(token)
    await repositoryStore.syncRepositories(token)

    return router.push('/dashboard')
  }

  await router.push('/login')
})
</script>