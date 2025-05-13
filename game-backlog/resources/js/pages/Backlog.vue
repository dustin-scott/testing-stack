<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue'
import { PaginationEllipsis, PaginationFirst, PaginationLast, PaginationList, PaginationListItem, PaginationNext, PaginationPrev, PaginationRoot } from 'reka-ui'
import { computed, ref } from 'vue';
import { Button } from '@/components/ui/button';
import { Link, router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Backlog',
        href: '/backlog',
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
    {id: 1, title: "test", "completed": false},
    {id: 2, title: "test2", "completed": false},
    {id: 3, title: "test3", "completed": true}
];
const headers = Object.keys(testData[0]).map((value) => {
    if(value.length < 2) {
        return value.toUpperCase();
    }
    return value.charAt(0).toUpperCase() + value.slice(1);
});
const tableClasses = "gap-4 p-4 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border";
</script>

<template>
    <Head title="Backlog" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Button>Add To Backlog</Button>
        <Link class="block w-full" :href="route('backlog.new')">
            Add To Backlog
        </Link>
        <div>Page {{currentPage}}</div>
      <table>
          <thead>
              <tr>
                  <th :class="tableClasses" v-for="(header) in headers">{{header}}</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(item, index) in testData" :key="item.title">
                  <td :class="tableClasses">{{item.id}}</td>
                  <td :class="tableClasses">{{item.title}}</td>
                  <td :class="tableClasses"><input type="checkbox" value="1" :checked="item.completed"></td>
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
