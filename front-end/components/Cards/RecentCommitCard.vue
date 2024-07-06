<template>
  <Card>
    <CardHeader>
      <CardTitle>Last Commits</CardTitle>
    </CardHeader>
    <CardContent class="grid gap-4">
      <CommitItem v-for="commit in recentCommits" :author="commit.author" :message="commit.message"
                  :time="commit.time"/>
    </CardContent>
  </Card>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardContent from '@/components/ui/card/CardContent.vue'
import CommitItem from '@/components/Cards/CommitItem.vue'

const repositoryStore = useRepositoryStore();

// Author: 2 characters of the author's name
const recentCommits = computed(() => repositoryStore.recentCommits.map(commit => {
  return {
    author: commit.author_name.slice(0, 2).toUpperCase(),
    message: commit.message,
    time: commit.last_updated_at
  }
}));
</script>
