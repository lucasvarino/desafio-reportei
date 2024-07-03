<template>
  <Header />
  <DashboardMain v-if="isSelected" />
  <HeroSection v-else />
</template>

<script setup>
import Header from '@/components/Header'
import { useStorage } from "@vueuse/core";

const isSelected = useStorage('repository', "");
const userStore = useUserStore();

onMounted(async () => {
  const repos = await fetch('http://localhost:8000/api/repositories', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${userStore.token}`
    }
  })

  console.log(await repos.json());
})
</script>
