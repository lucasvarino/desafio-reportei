<template>
  <div class="min-h-screen bg-gray-50">
    <header class="flex items-center justify-between p-4 bg-blue-600">
      <div class="flex items-center space-x-2">
        <Skeleton class="w-8 h-8 rounded-full" />
        <Skeleton class="w-32 h-6" />
      </div>
      <Skeleton class="w-8 h-8 rounded-full" />
    </header>
    <main class="p-4 space-y-4">
      <section class="p-4 bg-white rounded-md shadow">
        <Skeleton class="w-40 h-6 mb-2" />
        <Skeleton class="w-full h-4 mb-4" />
        <Skeleton class="w-full h-64" />
      </section>
      <div class="grid gap-4 md:grid-cols-2">
        <section class="p-4 bg-white rounded-md shadow">
          <Skeleton class="w-40 h-6 mb-2" />
          <Skeleton class="w-full h-4 mb-4" />
          <div class="space-y-2">
            <Skeleton class="w-full h-4" />
            <Skeleton class="w-full h-4" />
            <Skeleton class="w-full h-4" />
            <Skeleton class="w-full h-4" />
          </div>
        </section>
        <section class="p-4 bg-white rounded-md shadow">
          <Skeleton class="w-40 h-6 mb-2" />
          <div class="space-y-2">
            <div class="flex items-center space-x-2">
              <Skeleton class="w-8 h-8 rounded-full" />
              <div class="space-y-1">
                <Skeleton class="w-24 h-4" />
                <Skeleton class="w-16 h-4" />
              </div>
            </div>
            <div class="flex items-center space-x-2">
              <Skeleton class="w-8 h-8 rounded-full" />
              <div class="space-y-1">
                <Skeleton class="w-24 h-4" />
                <Skeleton class="w-16 h-4" />
              </div>
            </div>
            <div class="flex items-center space-x-2">
              <Skeleton class="w-8 h-8 rounded-full" />
              <div class="space-y-1">
                <Skeleton class="w-24 h-4" />
                <Skeleton class="w-16 h-4" />
              </div>
            </div>
            <div class="flex items-center space-x-2">
              <Skeleton class="w-8 h-8 rounded-full" />
              <div class="space-y-1">
                <Skeleton class="w-24 h-4" />
                <Skeleton class="w-16 h-4" />
              </div>
            </div>
          </div>
        </section>
      </div>
      <section class="p-4 bg-white rounded-md shadow">
        <Skeleton class="w-40 h-6 mb-2" />
        <div class="grid grid-cols-3 gap-4">
          <Skeleton class="w-full h-4" />
          <Skeleton class="w-full h-4" />
          <Skeleton class="w-full h-4" />
        </div>
      </section>
    </main>
  </div>
</template>

<script setup>
import Skeleton from '@/components/ui/skeleton/Skeleton.vue';
</script>