<template>
  <Header />
  <DashboardMain v-if="isSelected && repositoryStore.repository" />
  <HeroSection v-else />
</template>

<script setup>
import Header from '@/components/Header'
import { useStorage } from "@vueuse/core";

const isSelected = useStorage('repository', "");
const userStore = useUserStore();
const repositoryStore = useRepositoryStore();

onMounted(async () => {
  if (isSelected) {
    await repositoryStore.fetchRepository(isSelected.value, userStore.token)
  }
})
</script>
