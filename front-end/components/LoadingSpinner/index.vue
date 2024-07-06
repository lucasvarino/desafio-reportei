<template>
  <div class="flex items-center justify-center">
    <div class="h-16 w-16 animate-spin rounded-full border-4 border-primary border-t-transparent"></div>
    <div class="absolute">
      <GithubIcon class="h-8 w-8 text-primary" />
    </div>
  </div>
</template>
<script setup lang="ts">
import GithubIcon from "~/components/icons/GithubIcon.vue";
</script>