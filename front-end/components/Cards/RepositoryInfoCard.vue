<template>
  <Card>
    <CardHeader>
      <CardTitle>Repository Info</CardTitle>
    </CardHeader>
    <CardContent class="grid gap-4">
      <InfoItem title="shadcn/ui" description="Beautifully designed components">
        <BookOpenIcon class="w-6 h-6" />
      </InfoItem>
      <InfoItem title="20k" description="Stars" >
        <StarIcon class="w-6 h-6" />
      </InfoItem>
      <InfoItem title="main" description="Branch">
        <GitBranchIcon class="w-6 h-6" />
      </InfoItem>
      <InfoItem title="April 2023" description="Last updated">
        <CalendarIcon class="w-6 h-6" />
      </InfoItem>
    </CardContent>
  </Card>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardContent from '@/components/ui/card/CardContent.vue'
import InfoItem from '@/components/Cards/InfoItem.vue'
import BookOpenIcon from "~/components/icons/BookOpenIcon.vue";
import StarIcon from "~/components/icons/StarIcon.vue";
import GitBranchIcon from "~/components/icons/GitBranchIcon.vue";
import CalendarIcon from "~/components/icons/CalendarIcon.vue";
</script>
