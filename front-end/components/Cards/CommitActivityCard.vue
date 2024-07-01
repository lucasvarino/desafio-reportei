<template>
  <Card>
    <CardHeader>
      <CardTitle>Commit Activity</CardTitle>
      <CardDescription>
        A graph showing the number of commits over time for your GitHub repository.
      </CardDescription>
    </CardHeader>
    <CardContent>
      <!-- Gráfico aqui -->
    </CardContent>
  </Card>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardDescription from '@/components/ui/card/CardDescription.vue'
</script>
