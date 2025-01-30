<template lang="">


    <div>
       <Summary :models="notification" />
    </div>

    <div v-if="notification.data.length" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <div v-for="notify in notification.data" :key="notify.id" >
            {{notify}}
            </div>
    </div>
    <EmptyState v-else class="text-center">No Notification</EmptyState>

    <div v-if="notification.data.length" class="w-full flex justify-center mt-6 mb-4">
        <Pagination :links="notification.links" />
    </div>


</template>
<script setup>
import Listing from "@/Pages/Listing/Index/Components/Listing.vue"
import Pagination from "@/Components/UI/Pagination.vue"
import Summary from "@/Components/UI/Summary.vue"
import Filters from "@/Pages/Listing/Index/Components/Filters.vue"

defineProps({
    notification: Object,
    // filters: Object,
});

</script>
