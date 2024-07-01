<template>
  <div class="flex items-center gap-4">
    <Avatar>
      <AvatarImage :src="avatarSrc" />
      <AvatarFallback>{{ author }}</AvatarFallback>
    </Avatar>
    <div>
      <div class="font-medium">{{ message }}</div>
      <div class="text-sm text-muted-foreground">{{ time }}</div>
    </div>
  </div>
</template>

<script setup>
import Avatar from '@/components/ui/avatar/Avatar.vue'
import AvatarImage from '@/components/ui/avatar/AvatarImage.vue'
import AvatarFallback from '@/components/ui/avatar/AvatarFallback.vue'

const props = defineProps({
  avatarSrc: String,
  author: String,
  message: String,
  time: String
})
</script>
