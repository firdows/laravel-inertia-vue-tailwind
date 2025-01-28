<template>
  <nav v-if="breadcrumbs.length > 1" aria-label="breadcrumb" class="my-3 mt-1">
    <ol class="flex space-x-2 text-sm">
      <li v-for="(item, index) in breadcrumbs" :key="index" class="flex items-center">
        <span v-if="index < breadcrumbs.length - 1">
          <Link v-if="item.url" :href="item.url" class="text-blue-600 hover:underline">{{
            item.title
          }}</Link>
          <span v-else class="text-gray-500">{{ item.title }}</span>
          <span class="ml-2 text-gray-400">{{ separator }}</span>
        </span>
        <span v-else class="text-gray-500">
          {{ item.title }}
        </span>
      </li>
    </ol>
  </nav>
</template>
<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

defineProps({
  separator: {
    type: String,
    default: "/",
  },
});

const page = usePage();
const breadcrumbs = computed(() => page.props.breadcrumbs);
</script>
