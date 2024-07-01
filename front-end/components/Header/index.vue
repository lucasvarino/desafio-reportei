<template>
  <header class="bg-primary text-primary-foreground py-4 px-6 flex items-center justify-between">
    <div class="flex items-center gap-4">
      <NuxtLink to="#" class="flex items-center gap-2">
        <GithubIcon class="w-6 h-6" />
        <span class="text-lg font-semibold">GitHub Dashboard</span>
      </NuxtLink>
      <nav class="hidden md:flex items-center gap-4 text-sm font-medium">
        <NavLink to="#">Overview</NavLink>
      </nav>
    </div>
    <UserDropdown  avatar-src="https://github.com/lucasvarino.png" user-name="lucasvarino"/>
  </header>
</template>

<script setup>
import GithubIcon from '@/components/icons/GithubIcon.vue'
import UserDropdown from '@/components/UserDropdown'
import NavLink from '@/components/NavLink'
</script>
