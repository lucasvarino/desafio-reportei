<template>
  <div class="flex min-h-[100vh] flex-col">
    <header class="sticky top-0 z-20 flex h-14 w-full items-center justify-between border-b bg-background px-4 md:px-6">
      <NuxtLink to="#" class="flex items-center">
        <div class="bg-primary rounded-md p-2">
          <GithubIcon class="h-4 w-4 text-primary-foreground" />
        </div>
        <span class="sr-only">GitHub Metrics</span>
      </NuxtLink>
      <nav class="hidden gap-4 sm:flex">
        <NuxtLink to="#" class="text-sm font-medium hover:underline underline-offset-4">
          Features
        </NuxtLink>
        <NuxtLink to="#" class="text-sm font-medium hover:underline underline-offset-4">
          Metrics
        </NuxtLink>
        <NuxtLink to="#" class="text-sm font-medium hover:underline underline-offset-4">
          Pricing
        </NuxtLink>
        <NuxtLink to="#" class="text-sm font-medium hover:underline underline-offset-4">
          Contact
        </NuxtLink>
      </nav>
      <NuxtLink
          to="/login"
          class="inline-flex h-10 items-center justify-center rounded-md bg-primary px-8 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
      >
        Get Started
      </NuxtLink>
    </header>
    <main class="flex-1">
      <section class="w-full bg-muted py-12 md:py-24 lg:py-32">
        <div class="container px-4 md:px-6">
          <div class="grid gap-6 lg:grid-cols-[1fr_400px] lg:gap-12 xl:grid-cols-[1fr_600px]">
            <div class="flex flex-col justify-center space-y-4">
              <div class="space-y-2">
                <h1 class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none">
                  Unlock the Power of Your GitHub Data
                </h1>
                <p class="max-w-[600px] text-muted-foreground md:text-xl">
                  Gain valuable insights into your GitHub repositories and commits with our powerful metrics
                  dashboard.
                </p>
              </div>
              <div class="flex gap-2 min-[400px] flex-row">
                <NuxtLink
                    to="/login"
                    class="inline-flex h-10 items-center justify-center rounded-md bg-primary px-8 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
                >
                  Get Started
                </NuxtLink>
                <NuxtLink
                    to="#"
                    class="inline-flex h-10 items-center justify-center rounded-md border border-input bg-background px-8 text-sm font-medium shadow-sm transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
                >
                  Learn More
                </NuxtLink>
              </div>
            </div>
            <img
                src="/githubCat.jpg"
                width="550"
                height="550"
                alt="Hero"
                class="mx-auto aspect-video overflow-hidden rounded-xl object-cover sm:w-full lg:order-last lg:aspect-square"
            />
          </div>
        </div>
      </section>
      <section id="features" class="w-full py-12 md:py-24 lg:py-32">
        <div class="container space-y-12 px-4 md:px-6">
          <div class="flex flex-col items-center justify-center space-y-4 text-center">
            <div class="space-y-2">
              <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">Key Features</div>
              <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl">Unlock Valuable Insights</h2>
              <p class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                Our GitHub metrics dashboard provides a comprehensive view of your repository and commit data, helping
                you make informed decisions and drive your team's productivity.
              </p>
            </div>
          </div>
          <div class="mx-auto grid max-w-5xl items-start gap-8 sm:grid-cols-2 md:gap-12 lg:grid-cols-3">
            <div class="grid gap-1">
              <div class="bg-primary rounded-md p-4">
                <UserIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <h3 class="text-lg font-bold">Repository Insights</h3>
              <p class="text-muted-foreground">
                Track the growth and activity of your GitHub repositories, including the number of commits, branches,
                and contributors.
              </p>
            </div>
            <div class="grid gap-1">
              <div class="bg-primary rounded-md p-4">
                <CommandIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <h3 class="text-lg font-bold">Commit Analytics</h3>
              <p class="text-muted-foreground">
                Gain insights into your team's commit patterns, including the most active contributors and the
                frequency of commits.
              </p>
            </div>
            <div class="grid gap-1">
              <div class="bg-primary rounded-md p-4">
                <GitPullRequestIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <h3 class="text-lg font-bold">Contributor Tracking</h3>
              <p class="text-muted-foreground">
                Understand the involvement and contribution levels of your team members, helping you identify key
                contributors and areas for improvement.
              </p>
            </div>
            <div class="grid gap-1">
              <div class="bg-primary rounded-md p-4">
                <TimerIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <h3 class="text-lg font-bold">Trend Analysis</h3>
              <p class="text-muted-foreground">
                Visualize the historical trends of your repositories and commits, allowing you to identify patterns
                and make data-driven decisions.
              </p>
            </div>
            <div class="grid gap-1">
              <div class="bg-primary rounded-md p-4">
                <SignalIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <h3 class="text-lg font-bold">Alerts and Notifications</h3>
              <p class="text-muted-foreground">
                Stay informed about important changes and events in your GitHub repositories, such as new commits,
                branches, or contributors.
              </p>
            </div>
            <div class="grid gap-1">
              <div class="bg-primary rounded-md p-4">
                <MergeIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <h3 class="text-lg font-bold">Seamless Integration</h3>
              <p class="text-muted-foreground">
                Easily connect your GitHub account and start tracking your repository and commit data with our
                intuitive dashboard.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section id="metrics" class="w-full py-12 md:py-24 lg:py-32 bg-muted">
        <div class="container space-y-12 px-4 md:px-6">
          <div class="flex flex-col items-center justify-center space-y-4 text-center">
            <div class="space-y-2">
              <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">GitHub Metrics</div>
              <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl">Insights at a Glance</h2>
              <p class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                Explore the key metrics that matter most to your GitHub repositories and commit history.
              </p>
            </div>
          </div>
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <Card class="flex flex-col items-center justify-center gap-2 rounded-lg bg-background p-6 text-center shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <RecycleIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-4xl font-bold">1,234</div>
              <div class="text-muted-foreground">Repositories</div>
            </Card>
            <Card class="flex flex-col items-center justify-center gap-2 rounded-lg bg-background p-6 text-center shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <CommandIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-4xl font-bold">5,678</div>
              <div class="text-muted-foreground">Commits</div>
            </Card>
            <Card class="flex flex-col items-center justify-center gap-2 rounded-lg bg-background p-6 text-center shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <UserIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-4xl font-bold">9,012</div>
              <div class="text-muted-foreground">Contributors</div>
            </Card>
            <Card class="flex flex-col items-center justify-center gap-2 rounded-lg bg-background p-6 text-center shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <TimerIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-4xl font-bold">3,456</div>
              <div class="text-muted-foreground">Commits per Week</div>
            </Card>
          </div>
        </div>
      </section>
      <section id="pricing" class="w-full py-12 md:py-24 lg:py-32">
        <div class="container space-y-12 px-4 md:px-6">
          <div class="flex flex-col items-center justify-center space-y-4 text-center">
            <div class="space-y-2">
              <div class="inline-block rounded-lg bg-muted px-3 py-1 text-sm">Pricing Plans</div>
              <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl">Choose Your Plan</h2>
              <p class="max-w-[900px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                Explore our flexible pricing options designed to meet your team's needs and budget.
              </p>
            </div>
          </div>
          <div class="mx-auto grid max-w-5xl items-start gap-8 sm:grid-cols-2 md:gap-12 lg:grid-cols-3">
            <div class="bg-background p-6 text-center rounded-lg shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <RecycleIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-xl font-bold mt-4">Basic Plan</div>
              <div class="text-lg text-muted-foreground mt-2">$9/month</div>
              <ul class="text-left mt-4">
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Unlimited Repositories
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Basic Metrics Dashboard
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Weekly Reports
                </li>
                <li class="flex items-center gap-2">
                  <XIcon class="h-5 w-5 text-muted-foreground" />
                  Limited Support
                </li>
              </ul>
              <div class="mt-6">
                <NuxtLink
                    to="#"
                    class="inline-block rounded-md bg-accent text-accent-foreground px-6 py-3 font-medium transition-colors shadow hover:bg-accent-hover focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
                >
                  Choose Plan
                </NuxtLink>
              </div>
            </div>
            <div class="bg-background p-6 text-center rounded-lg shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <CommandIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-xl font-bold mt-4">Standard Plan</div>
              <div class="text-lg text-muted-foreground mt-2">$19/month</div>
              <ul class="text-left mt-4">
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Advanced Metrics Dashboard
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Daily Reports
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Priority Support
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Custom Dashboards
                </li>
              </ul>
              <div class="mt-6">
                <NuxtLink
                    to="#"
                    class="inline-block rounded-md bg-accent text-accent-foreground px-6 py-3 font-medium transition-colors shadow hover:bg-accent-hover focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
                >
                  Choose Plan
                </NuxtLink>
              </div>
            </div>
            <div class="bg-background p-6 text-center rounded-lg shadow-sm">
              <div class="bg-primary rounded-md p-4">
                <UserIcon class="h-8 w-8 text-primary-foreground" />
              </div>
              <div class="text-xl font-bold mt-4">Premium Plan</div>
              <div class="text-lg text-muted-foreground mt-2">$29/month</div>
              <ul class="text-left mt-4">
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  All Standard Plan Features
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Real-time Analytics
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  24/7 Support
                </li>
                <li class="flex items-center gap-2">
                  <CheckIcon class="h-5 w-5 text-accent-foreground" />
                  Custom Integrations
                </li>
              </ul>
              <div class="mt-6">
                <NuxtLink
                    to="#"
                    class="inline-block rounded-md bg-accent text-accent-foreground px-6 py-3 font-medium transition-colors shadow hover:bg-accent-hover focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
                >
                  Choose Plan
                </NuxtLink>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-background py-6">
      <div class="container flex flex-col items-center justify-center text-center gap-4 px-4 md:px-6">
        <div>
          <span class="text-sm text-muted-foreground">&copy; 2024 GitHub Dashboard. All rights reserved.</span>
        </div>
        <div class="flex gap-4">
          <NuxtLink to="#" class="text-sm text-muted-foreground hover:underline underline-offset-4">
            Privacy Policy
          </NuxtLink>
          <NuxtLink to="#" class="text-sm text-muted-foreground hover:underline underline-offset-4">
            Terms of Service
          </NuxtLink>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import Card from '@/components/ui/card/Card.vue';
import CommandIcon from "~/components/icons/CommandIcon.vue";
import RecycleIcon from "~/components/icons/RecycleIcon.vue";
import TimerIcon from "~/components/icons/TimerIcon.vue";
import SignalIcon from "~/components/icons/SignalIcon.vue";
import MergeIcon from "~/components/icons/MergeIcon.vue";
import GithubIcon from "~/components/icons/GithubIcon.vue";
import CheckIcon from "~/components/icons/CheckIcon.vue";
import XIcon from "~/components/icons/XIcon.vue";
import UserIcon from "~/components/icons/UserIcon.vue";
import GitPullRequestIcon from "~/components/icons/GitPullRequestIcon.vue";

useHead({
  title: 'GitHub Dashboard - Reportei Tech Challenge',
  meta: [
    {
      name: 'description',
      content: 'Unlock the power of your GitHub data with our powerful metrics dashboard.'
    },
    {
      name: 'keywords',
      content: 'GitHub, metrics, dashboard, insights, repositories, commits, contributors'
    }
  ]
})
</script>

