<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium dark:text-gray-300">
                    <Link :href="route('home')">Listings</Link>
                </div>

                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>

                <div v-if="user" class="flex items-center gap-3">
                    <Link :href="route('notification.index')">
                    <div class="text-gray-500 relative pr-2 py-2 text-lg">
                        <AkBell class="text-xl" />
                        <div v-if="notificationCount"
                            class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                            {{ notificationCount }}
                        </div>
                    </div>
                    </Link>
                    <Link :href="route('realtor.listing.index')">{{ user.name }}</Link>
                    <Link :href="route('realtor.listing.create')" class="btn-primary flex items-center gap-1">
                    <AkCirclePlus /><span class="hidden md:inline">New Listing</span>
                    </Link>
                    <Link :href="route('logout')" method="delete" as="button"> Sign-out </Link>
                </div>
                <div v-else class="flex items-center gap-3">
                    <Link :href="route('user-account.create')"> Register </Link>
                    <Link :href="route('login')" class="">
                    <AnOutlinedLogin class="inline" /> Sign-in
                    </Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <Breadcrumb :items="page.props.breadcrumbs" />

        <div v-if="flashSuccess"
            class="mb-4 border rounded-md shadow-sm text-white border-green-200 dark:border-green-800 bg-green-500 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { AnOutlinedLogin, AkCirclePlus, AkBell } from "@kalimahapps/vue-icons";

import Breadcrumb from "./Breadcrumb.vue";

// const timer = ref(0);
// setInterval(() => {
//     timer.value++;
// }, 1000);

// let x = ref(0);
// const y = computed(() => x.value * 2);

const page = usePage();
const flashSuccess = computed(
    () => page.props.flash.success
);

const user = computed(
    () => page.props.user
);

const notificationCount = computed(
    () => Math.min(page.props.user.notificationCount, 9)
);
</script>
