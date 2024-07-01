<template>
  <DropdownMenu>
    <DropdownMenuTrigger asChild>
      <Button variant="ghost" size="icon" class="rounded-full">
        <img :src="avatarSrc" width="32" height="32" alt="Avatar" class="rounded-full" />
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent align="end" class="w-56">
      <DropdownMenuLabel class="font-medium">{{ userName }}</DropdownMenuLabel>
      <DropdownMenuSeparator />
      <DropdownMenuItem>
        <UserIcon class="w-4 h-4 mr-2" />
        Profile
      </DropdownMenuItem>
      <DropdownMenuItem>
        <SettingsIcon class="w-4 h-4 mr-2" />
        Settings
      </DropdownMenuItem>
      <DropdownMenuSeparator />
      <DropdownMenuItem>
        <LogOutIcon class="w-4 h-4 mr-2" />
        Logout
      </DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>

<script setup>
import DropdownMenu from '@/components/ui/dropdown-menu/DropdownMenu.vue'
import DropdownMenuTrigger from '@/components/ui/dropdown-menu/DropdownMenuTrigger.vue'
import DropdownMenuContent from '@/components/ui/dropdown-menu/DropdownMenuContent.vue'
import DropdownMenuLabel from '@/components/ui/dropdown-menu/DropdownMenuLabel.vue'
import DropdownMenuSeparator from '@/components/ui/dropdown-menu/DropdownMenuSeparator.vue'
import DropdownMenuItem from '@/components/ui/dropdown-menu/DropdownMenuItem.vue'
import Button from '@/components/ui/button/Button.vue'
import UserIcon from "~/components/icons/UserIcon.vue";
import SettingsIcon from "~/components/icons/SettingsIcon.vue";
import LogOutIcon from "~/components/icons/LogOutIcon.vue";

const props = defineProps({
  userName: {
    type: String,
    required: true
  },
  avatarSrc: {
    type: String,
    required: true
  }
})
</script>
