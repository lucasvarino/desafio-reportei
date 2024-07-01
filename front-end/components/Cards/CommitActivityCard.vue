<template>
  <Card>
    <CardHeader>
      <CardTitle>Commit Activity</CardTitle>
      <CardDescription>
        A graph showing the number of commits over time for your GitHub repository.
      </CardDescription>
    </CardHeader>
    <CardContent>
      <div class="w-full h-64 md:h-96">
        <AreaChart :data="data" index="date" :categories="['commits']" />
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

const data = [];

onMounted(() => {
  const getRandomCommits = () => Math.floor(Math.random() * 10);

  const today = new Date();
  for (let i = 0; i < 90; i++) {
    const date = new Date(today);
    date.setDate(today.getDate() - i);

    const formattedDate = date.toISOString().split('T')[0];

    data.push({
      date: formattedDate,
      commits: getRandomCommits(),
    });
  }

  console.log(data);
});

</script>
