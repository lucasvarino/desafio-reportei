<template>
  <svg
      xmlns="http://www.w3.org/2000/svg"
      :width="size"
      :height="size"
      viewBox="0 0 24 24"
      fill="none"
      :stroke="color"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
  >
    <path d="M18 6L6 18M6 6l12 12" />
  </svg>
</template>

<script setup>
const props = defineProps({
  size: {
    type: String,
    default: "24"
  },
  color: {
    type: String,
    default: "currentColor"
  }
});
</script>
