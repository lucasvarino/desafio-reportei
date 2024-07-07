<template>
  <div class="flex min-h-[100dvh] flex-col items-center justify-center bg-background px-4 py-12 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-md text-center">
      <div class="inline-flex items-center justify-center rounded-full bg-primary p-4 text-primary-foreground">
        <GithubIcon iconClass="h-8 w-8" />
      </div>
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-foreground sm:text-4xl">
        Welcome to the GitHub Dashboard
      </h1>
      <p class="mt-4 text-muted-foreground">
        Access your repository information and commit history by signing in with GitHub.
      </p>
      <div class="mt-6">
        <Button @click="login" class="inline-flex items-center justify-center rounded-md px-4 py-2 text-sm font-medium shadow-sm transition-colors hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
          <GithubIcon iconClass="mr-2 h-5 w-5" />
          Sign in with GitHub
        </Button>
      </div>
    </div>
  </div>
</template>

<script setup>
import Button from '@/components/ui/button/Button.vue'
import GithubIcon from '@/components/icons/GithubIcon.vue'

const userStore = useUserStore()
const router = useRouter()
const login = () => {
  window.location.href = 'https://api.lucasvarino.tech/api/auth/github'
}

onMounted(() => {
  if (userStore.isLogged()) {
    router.push('/dashboard')
  }
})
</script>