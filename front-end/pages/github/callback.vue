<template>
  <div>
    <h1>Redirecting...</h1>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

onMounted(async () => {
  const code = router.currentRoute.value.query.code
  if (code) {
    // Get request for token
    const response = await fetch(`http://localhost:8000/api/auth/github/callback?code=${code}`)
    const data = await response.json()
    const token = data.token

    console.log(token)

    // Save token to local storage
    localStorage.setItem('token', token)

    return router.push('/dashboard')
  }

  await router.push('/login')
})
</script>