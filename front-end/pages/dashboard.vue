<template>
  <SkeletonLoader v-if="loading"/>
  <div v-else>
    <Header />
    <DashboardMain v-if="isSelected && repositoryStore.repository" />
    <HeroSection v-else />
  </div>
</template>

<script setup>
import Header from '@/components/Header'
import { useStorage } from "@vueuse/core";
import SkeletonLoader from '@/components/SkeletonLoader/index.vue'

const loading = ref(true);
const isSelected = useStorage('repository', "");
const userStore = useUserStore();
const repositoryStore = useRepositoryStore();
const loadingIndicator = useLoadingIndicator();

onMounted(async () => {
  loadingIndicator.start();
  if (isSelected && isSelected.value !== "") {
    await repositoryStore.fetchRepository(isSelected.value, userStore.token)
    await repositoryStore.fetchCommits(isSelected.value, userStore.token)
    loading.value = false;
  }
  loadingIndicator.finish();
  loading.value = false;
})
</script>
