<template lang="">
    <h1 class="text-3xl mb-4">Your Listings</h1>

    <section class="mb-4">
        <RealtorFilters :filters="filters"/>
    </section>

    <!-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div> -->

    <div>
       <Summary :models="listings" ></Summary>
    </div>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
       <Box v-for="listing in listings.data" :key="listing.id" :class="{ 'border-dashed': listing.deleted_at }">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                
                    <div>
                        <div class="xl:flex items-center">
                            <Price :price="listing.price" class="text-2xl font-medium mr-2"/>
                            <ListingSpace :listing="listing" />
                        </div>
                        <ListingAddress :listing="listing" class="text-sm text-gray-500 dark:text-gray-400" />
                    </div>

                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <Link class="btn-outline text-xs font-medium" :href="route('listing.show', { listing: listing.id })">Preview</Link>
                        <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.edit', { listing: listing.id })">Edit</Link>

                        <Link v-if="listing.deleted_at"
                        class="btn-outline text-xs font-medium" :href="route('realtor.listing.restore',{listing:listing.id})" method="put" at="button" >Restore</Link>
                        <Link v-else
                        class="btn-outline text-xs font-medium" :href="route('realtor.listing.destroy',{listing:listing.id})" method="delete" at="button"  >Delete</Link>                       
                    
                    </div>
                    <div class="mt-2">
                        <Link :href="route('realtor.listing.image.create', { listing: listing.id })" class="block w-full btn-outline text-xs font-medium text-center">Images</Link>
                    </div>
                </section>
            </div>
       </Box>
    </section>

    <div class="m-4 flex justify-center w-full">
       <Pagination :links="listings.links" />
    </div>


    
</template>

<script setup>
import Box from "@/Components/UI/Box.vue"
import Price from "@/Components/Price.vue"
import ListingSpace from "@/Components/ListingSpace.vue"
import ListingAddress from "@/Components/ListingAddress.vue"
import Summary from "@/Components/UI/Summary.vue"
import Pagination from "@/Components/UI/Pagination.vue"
import RealtorFilters from "./Components/RealtorFilters.vue"
import { Link, useForm } from "@inertiajs/vue3"
const props = defineProps({
    listings:Object,
    filters: Object,
});

const btnDelete = () =>{
    if(confirm('You are delete this item?')){
        return true;
    }
    return false;
}


</script>
<style lang="">
    
</style>