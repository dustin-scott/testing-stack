<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { Icon } from '@iconify/vue'
import { PaginationEllipsis, PaginationFirst, PaginationLast, PaginationList, PaginationListItem, PaginationNext, PaginationPrev, PaginationRoot } from 'reka-ui'
import { computed, ref } from 'vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const defaultPage = 1;
const numberOfResults = 100;
const itemsPerPage = 10;
const currentPage = ref(1);
const test = computed({
    get: () => currentPage.value,
    set: (value) => {
        console.log(value);
        currentPage.value = value;
    }
});
const testData = [
    {title: "test", "completed": false},
    {title: "test2", "completed": false},
    {title: "test3", "completed": true}
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
        <div>Page {{currentPage}}</div>
      <table>
          <thead>
              <tr>
                  <th>#</th>
                  <th>
                      Title
                  </th>
                  <th>Completed</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(item, index) in testData" :key="item.title">
                  <td>{{index + 1}}</td>
                  <td>{{item.title}}</td>
                  <td><input type="checkbox" value="1" :checked="item.completed"></td>
              </tr>
          </tbody>
      </table>
      <PaginationRoot
        :total="numberOfResults"
        :sibling-count="1"
        :items-per-page="itemsPerPage"
        show-edges
        :default-page="defaultPage"
        v-model:page="currentPage"
      >
        <PaginationList
          v-slot="{ items }"
          class="flex items-center gap-1 text-stone-700 dark:text-white"
        >
          <PaginationFirst class="w-9 h-9  flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition disabled:opacity-50 rounded-lg">
            <Icon icon="radix-icons:double-arrow-left" />
          </PaginationFirst>
          <PaginationPrev class="w-9 h-9  flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition mr-4  disabled:opacity-50 rounded-lg">
            <Icon icon="radix-icons:chevron-left" />
          </PaginationPrev>
          <template v-for="(page, index) in items">
            <PaginationListItem
              v-if="page.type === 'page'"
              :key="index"
              class="w-9 h-9 border dark:border-stone-800 rounded-lg data-[selected]:!bg-white data-[selected]:shadow-sm data-[selected]:text-blackA11 hover:bg-white dark:hover:bg-stone-700/70 transition"
              :value="page.value"
            >
              {{ page.value }}
            </PaginationListItem>
            <PaginationEllipsis
              v-else
              :key="page.type"
              :index="index"
              class="w-9 h-9 flex items-center justify-center"
            >
              &#8230;
            </PaginationEllipsis>
          </template>
          <PaginationNext class="w-9 h-9  flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition ml-4 disabled:opacity-50 rounded-lg">
            <Icon icon="radix-icons:chevron-right" />
          </PaginationNext>
          <PaginationLast class="w-9 h-9  flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition disabled:opacity-50 rounded-lg">
            <Icon icon="radix-icons:double-arrow-right" />
          </PaginationLast>
        </PaginationList>
      </PaginationRoot>
    </AppLayout>
</template>
<style scoped>
    th {
        text-align: left;
    }
</style
