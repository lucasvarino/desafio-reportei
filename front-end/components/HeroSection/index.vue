<template>
  <section class="w-full h-[90vh] flex items-center justify-center bg-muted">
    <div class="container px-4 md:px-6 text-center">
      <div class="space-y-4">
        <h1 class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none">Analyze your repository</h1>
        <p class="max-w-[600px] mx-auto text-muted-foreground md:text-xl">
          Select a repository to generate metrics and charts.
        </p>
        <div class="flex justify-center">
          <RepositorySelect />
        </div>
      </div>
    </div>
  </section>
</template>