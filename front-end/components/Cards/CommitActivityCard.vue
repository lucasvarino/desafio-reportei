<template>
  <Card>
    <CardHeader>
      <div class="flex justify-between">
        <CardTitle>Commit Activity</CardTitle>
        <RepositorySelect />
      </div>
      <CardDescription>
        A graph showing the number of commits over time for your GitHub repository.
      </CardDescription>
    </CardHeader>
    <CardContent>
      <div class="w-full h-64 md:h-96">
        <AreaChart :data="commits" index="date" :categories="['count']" />
      </div>
    </CardContent>
  </Card>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardDescription from '@/components/ui/card/CardDescription.vue'
import AreaChart from "~/components/ui/chart-area/AreaChart.vue";

const repositoryStore = useRepositoryStore()
const commits = computed(() => repositoryStore.commits)


</script>
