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
const router = useRouter();

useHead({
  title: 'GitHub Dashboard - Reportei Tech Challenge',
  meta: [
    {
      name: 'description',
      content: 'Unlock the power of your GitHub data with our powerful metrics dashboard.'
    },
    {
      name: 'keywords',
      content: 'GitHub, metrics, dashboard, insights, repositories, commits, contributors'
    }
  ]
})

onMounted(async () => {
  if (!userStore.isLogged()) {
    await router.push('/login')
  }

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
