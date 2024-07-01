<template>
  <div class="flex items-center gap-4">
    <slot></slot>
    <div>
      <div class="font-medium">{{ value }}</div>
      <div class="text-sm text-muted-foreground">{{ label }}</div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  icon: String,
  value: String,
  label: String,
})
</script>
