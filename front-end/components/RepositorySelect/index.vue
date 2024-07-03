<script setup lang="ts">
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'
import { useStorage } from '@vueuse/core'

const repositoryStore = useRepositoryStore()
const selected = useStorage('repository', "");

const change = (value: string) => {
  selected.value = value;
}

const repositoriesValue = repositoryStore.repositoriesOptions
</script>

<template>
  <Select @update:modelValue="change" :default-value="selected">
    <SelectTrigger class="w-[300px]">
      <SelectValue placeholder="Select a repository" />
    </SelectTrigger>
    <SelectContent>
      <SelectGroup>
        <SelectLabel>Repositories</SelectLabel>
        <SelectItem v-for="repo in repositoriesValue" :value="repo.value">
          {{ repo.label }}
        </SelectItem>
      </SelectGroup>
    </SelectContent>
  </Select>
</template>