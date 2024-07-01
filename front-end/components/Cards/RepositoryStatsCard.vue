<template>
  <Card>
    <CardHeader>
      <CardTitle>Repository Stats</CardTitle>
    </CardHeader>
    <CardContent class="grid md:grid-cols-3 gap-4">
      <StatItem icon="DoorOpenIcon" value="120" label="Open Issues">
        <DoorOpenIcon class="w-6 h-6 text-muted-foreground" />
      </StatItem>
      <StatItem value="35" label="Open Pull Requests">
        <GitPullRequestIcon class="w-6 h-6 text-muted-foreground" />
      </StatItem>
      <StatItem value="2,345" label="Total Commits">
        <GitCommitVerticalIcon class="w-6 h-6 text-muted-foreground" />
      </StatItem>
    </CardContent>
  </Card>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardContent from '@/components/ui/card/CardContent.vue'
import StatItem from '@/components/Cards/StatItem.vue'
import DoorOpenIcon from "~/components/icons/DoorOpenIcon.vue";
import GitPullRequestIcon from "~/components/icons/GitPullRequestIcon.vue";
import GitCommitVerticalIcon from "~/components/icons/GitCommitVerticalIcon.vue";
</script>
