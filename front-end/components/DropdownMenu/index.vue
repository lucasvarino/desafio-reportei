<template>
  <div class="flex flex-col h-screen">
    <header class="bg-primary text-primary-foreground py-4 px-6 flex items-center justify-between">
      <div class="flex items-center gap-4">
        <NuxtLink to="#" class="flex items-center gap-2">
          <GithubIcon class="w-6 h-6" />
          <span class="text-lg font-semibold">GitHub Dashboard</span>
        </NuxtLink>
        <nav class="hidden md:flex items-center gap-4 text-sm font-medium">
          <NuxtLink to="#" class="hover:text-primary-foreground/80">
            Overview
          </NuxtLink>
          <NuxtLink to="#" class="hover:text-primary-foreground/80">
            Repositories
          </NuxtLink>
          <NuxtLink to="#" class="hover:text-primary-foreground/80">
            Issues
          </NuxtLink>
          <NuxtLink to="#" class="hover:text-primary-foreground/80">
            Pull Requests
          </NuxtLink>
        </nav>
      </div>
      <DropdownMenu>
        <DropdownMenuTrigger asChild>
          <Button variant="ghost" size="icon" class="rounded-full">
            <img src="/placeholder.svg" width="32" height="32" alt="Avatar" class="rounded-full" />
          </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end" class="w-56">
          <DropdownMenuLabel class="font-medium">John Doe</DropdownMenuLabel>
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
    </header>
    <main class="flex-1 bg-muted/40 p-6 md:p-10">
      <div class="max-w-6xl mx-auto grid gap-8">
        <Card>
          <CardHeader>
            <CardTitle>Commit Activity</CardTitle>
            <CardDescription>
              A graph showing the number of commits over time for your GitHub repository.
            </CardDescription>
          </CardHeader>
          <CardContent>
            <LineChart class="w-full aspect-[4/3]" />
          </CardContent>
        </Card>
        <div class="grid md:grid-cols-2 gap-6">
          <Card>
            <CardHeader>
              <CardTitle>Repository Info</CardTitle>
            </CardHeader>
            <CardContent class="grid gap-4">
              <div class="flex items-center gap-4">
                <BookOpenIcon class="w-8 h-8 text-muted-foreground" />
                <div>
                  <div class="font-medium">shadcn/ui</div>
                  <div class="text-sm text-muted-foreground">Beautifully designed components</div>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <StarIcon class="w-8 h-8 text-muted-foreground" />
                <div>
                  <div class="font-medium">20k</div>
                  <div class="text-sm text-muted-foreground">Stars</div>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <GitBranchIcon class="w-8 h-8 text-muted-foreground" />
                <div>
                  <div class="font-medium">main</div>
                  <div class="text-sm text-muted-foreground">Branch</div>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <CalendarIcon class="w-8 h-8 text-muted-foreground" />
                <div>
                  <div class="font-medium">April 2023</div>
                  <div class="text-sm text-muted-foreground">Last updated</div>
                </div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardHeader>
              <CardTitle>Recent Commits</CardTitle>
            </CardHeader>
            <CardContent class="grid gap-4">
              <div class="flex items-center gap-4">
                <Avatar>
                  <AvatarImage src="/placeholder-user.jpg" />
                  <AvatarFallback>CN</AvatarFallback>
                </Avatar>
                <div>
                  <div class="font-medium">feat: update color scheme</div>
                  <div class="text-sm text-muted-foreground">3 hours ago</div>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <Avatar>
                  <AvatarImage src="/placeholder-user.jpg" />
                  <AvatarFallback>JP</AvatarFallback>
                </Avatar>
                <div>
                  <div class="font-medium">docs: add docs for memberships</div>
                  <div class="text-sm text-muted-foreground">1 day ago</div>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <Avatar>
                  <AvatarImage src="/placeholder-user.jpg" />
                  <AvatarFallback>ML</AvatarFallback>
                </Avatar>
                <div>
                  <div class="font-medium">fix: login issues</div>
                  <div class="text-sm text-muted-foreground">2 days ago</div>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
        <Card>
          <CardHeader>
            <CardTitle>Repository Stats</CardTitle>
          </CardHeader>
          <CardContent class="grid md:grid-cols-3 gap-4">
            <div class="flex items-center gap-4">
              <DoorOpenIcon class="w-8 h-8 text-muted-foreground" />
              <div>
                <div class="font-medium">120</div>
                <div class="text-sm text-muted-foreground">Open Issues</div>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <GitPullRequestIcon class="w-8 h-8 text-muted-foreground" />
              <div>
                <div class="font-medium">35</div>
                <div class="text-sm text-muted-foreground">Open Pull Requests</div>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <GitCommitVerticalIcon class="w-8 h-8 text-muted-foreground" />
              <div>
                <div class="font-medium">2,345</div>
                <div class="text-sm text-muted-foreground">Total Commits</div>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </main>
  </div>
</template>

<script setup>
import GithubIcon from '@/components/icons/GithubIcon.vue'
import UserIcon from '@/components/icons/UserIcon.vue'
import SettingsIcon from '@/components/icons/SettingsIcon.vue'
import LogOutIcon from '@/components/icons/LogOutIcon.vue'
import BookOpenIcon from '@/components/icons/BookOpenIcon.vue'
import CalendarIcon from '@/components/icons/CalendarIcon.vue'
import DoorOpenIcon from '@/components/icons/DoorOpenIcon.vue'
import GitBranchIcon from '@/components/icons/GitBranchIcon.vue'
import GitCommitVerticalIcon from '@/components/icons/GitCommitVerticalIcon.vue'
import GitPullRequestIcon from '@/components/icons/GitPullRequestIcon.vue'
import LineChart from '@/components/charts/LineChart.vue'
import DropdownMenu from '@/components/ui/dropdown-menu/DropdownMenu.vue'
import DropdownMenuTrigger from '@/components/ui/dropdown-menu/DropdownMenuTrigger.vue'
import DropdownMenuContent from '@/components/ui/dropdown-menu/DropdownMenuContent.vue'
import DropdownMenuLabel from '@/components/ui/dropdown-menu/DropdownMenuLabel.vue'
import DropdownMenuSeparator from '@/components/ui/dropdown-menu/DropdownMenuSeparator.vue'
import DropdownMenuItem from '@/components/ui/dropdown-menu/DropdownMenuItem.vue'
import Button from '@/components/ui/button/Button.vue'
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import CardTitle from '@/components/ui/card/CardTitle.vue'
import CardDescription from '@/components/ui/card/CardDescription.vue'
import CardContent from '@/components/ui/card/CardContent.vue'
import Avatar from '@/components/ui/avatar/Avatar.vue'
import AvatarImage from '@/components/ui/avatar/AvatarImage.vue'
import AvatarFallback from '@/components/ui/avatar/AvatarFallback.vue'
</script>
