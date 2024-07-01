<template>
  <Card>
    <CardHeader>
      <CardTitle>Recent Commits</CardTitle>
    </CardHeader>
    <CardContent class="grid gap-4">
      <CommitItem author="CN" message="feat: update color scheme" time="3 hours ago" />
      <CommitItem author="LV" message="docs: add docs for memberships" time="1 day ago" />
      <CommitItem author="ML" message="fix: login issues" time="2 days ago" />
    </CardContent>
  </Card>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardContent from '@/components/ui/card/CardContent.vue'
import CommitItem from '@/components/Cards/CommitItem.vue'
</script>
