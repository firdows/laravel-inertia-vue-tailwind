<template lang="">
    <div class="flex gap-1">
          
        <!-- <Link 
            v-for="(link,index) in links" :key="index"
            :href="link.url"  
            v-html="link.label"
            class="py-2 px-4 rounded-md"
            :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-100':link.active}"
            >
        </Link> -->
        <div v-for="link in links" :key="link.url">
            <component
                :is="link.url ? Link : 'span'"
                :key="link.label"
                :href="link.url"
                v-html="makeLabel(link.label)"
                class="py-2 px-4 rounded-md"
        :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-100':link.active}"
            />            
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    links:Array
})

const makeLabel = (label) => {
    if (label.includes("Previous")) {
        return "<<";
    } else if (label.includes("Next")) {
        return ">>";
    } else {
        return label;
    }
};

</script>