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

const repo = useStorage('repository', "");

const change = (value: string) => {
  repo.value = value;
}
</script>

<template>
  <Select @update:modelValue="change" :default-value="repo">
    <SelectTrigger class="w-[300px]">
      <SelectValue placeholder="Select a repository" />
    </SelectTrigger>
    <SelectContent>
      <SelectGroup>
        <SelectLabel>Repositories</SelectLabel>
        <SelectItem value="triples-objekts">
          triples-objekts
        </SelectItem>
        <SelectItem value="desafio-reportei">
          desafio-reportei
        </SelectItem>
        <SelectItem value="ts-API">
          ts-API
        </SelectItem>
        <SelectItem value="todolist-rescript">
          todolist-rescript
        </SelectItem>
        <SelectItem value="pensamento-computacional">
          pensamento-computacional
        </SelectItem>
      </SelectGroup>
    </SelectContent>
  </Select>
</template>