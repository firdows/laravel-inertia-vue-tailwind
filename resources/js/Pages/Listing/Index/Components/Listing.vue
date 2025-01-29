<template lang="">
    <Box >
        <div>            
            <Link :href="route('listing.show',{listing:listing.id})">
            <div class="flex items-center gap-1">
                
                <Price :price="listing.price" class="text-xl font-bold" />
                <div class="text-xs text-gray-500">
                    <Price :price="monthlyPayment" class="dark:text-gray-350" />
                </div>
            </div>
                <ListingSpace :listing="listing" />
                <ListingAddress :listing="listing" />    
                <div class="text-xs dark:text-gray-400">
                    Owner : {{ owner }}
                </div>            
            </Link>
        </div>
        <!-- <div>
            <Link :href="route('listing.edit', { listing: listing.id })"> Edit </Link>
        </div> -->
        <!-- <div>
            <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button"> Delete </Link>
        </div> -->
    </Box>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";
import { computed } from "vue";

const props = defineProps({
    listing: Object,
});



const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
const owner = computed(() => props.listing.owner.name);
</script>
