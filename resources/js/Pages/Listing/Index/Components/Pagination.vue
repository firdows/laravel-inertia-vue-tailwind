<template lang="">
    <div class="flex gap-1">
          
        <Link 
            v-for="(link,index) in links" :key="index"
            :href="link.url"  
            v-html="link.label"
            class="py-2 px-4 rounded-md"
            :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-100':link.active}"
            >
        </Link>
           
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    links:Array
})

</script>