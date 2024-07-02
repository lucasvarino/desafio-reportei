<template>
  <Header />
  <DashboardMain v-if="isSelected" />
  <HeroSection v-else />
</template>

<script setup>
import Header from '@/components/Header'
import { useStorage } from "@vueuse/core";

const isSelected = useStorage('repository', "");
</script>
