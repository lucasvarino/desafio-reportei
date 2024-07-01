<template>
  <div class="flex items-center gap-4">
    <slot></slot>
    <div>
      <div class="font-medium">{{ title }}</div>
      <div class="text-sm text-muted-foreground">{{ description }}</div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  icon: String,
  title: String,
  description: String,
})
</script>
