<template>
  <NuxtLink :to="to" class="hover:text-primary-foreground/80">
    <slot></slot>
  </NuxtLink>
</template>

<script setup>
const props = defineProps({
  to: {
    type: String,
    required: true
  }
})
</script>
