<template>
    <div class="flex flex-col md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full ">
            <ul>
                <li v-for="offer in offers" :key="offer.id">
                    <Price :price="offer.amount" />
                </li>
            </ul>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>Basic Info</template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" />
                <ListingAddress :listing="listing" />
            </Box>            
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { reactive, ref, computed } from "vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";

const props = defineProps({
    listing: Object,
    offers: Object,
});

const interestRate = ref(2.5);
const duration = ref(25);

const {monthlyPayment,totalPaid,totalInterest}  = useMonthlyPayment(props.listing.price,interestRate,duration);
</script>