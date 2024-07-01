<template>
  <main class="flex-1 bg-muted/40 p-6 md:p-10">
    <div class="max-w-6xl mx-auto grid gap-8">
      <CommitActivityCard />
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <RepositoryInfoCard />
        <RecentCommitsCard />
      </div>
      <RepositoryStatsCard />
    </div>
  </main>
</template>

<script setup>
import CommitActivityCard from '@/components/Cards/CommitActivityCard.vue'
import RepositoryInfoCard from '@/components/Cards/RepositoryInfoCard.vue'
import RecentCommitsCard from '@/components/Cards/RecentCommitCard.vue'
import RepositoryStatsCard from '@/components/Cards/RepositoryStatsCard.vue'
</script>
