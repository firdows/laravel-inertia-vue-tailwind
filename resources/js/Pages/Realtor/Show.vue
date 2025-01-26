<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full ">
            <div class="w-full text-center font-medium text-gray-500">
                No Image
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>Basic Info</template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" />
                <ListingAddress :listing="listing" />
            </Box>
            <Box>
                <template #header>Month Payment</template>
                
                    <label class="label">Interest Rate ({{ interestRate }}%)</label>
                    <input
                        type="range"
                        min="0.1"
                        max="30"
                        step="0.1"
                        class="w-full h4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        v-model="interestRate"
                    />
                
                    <label class="label">Duration ({{ duration }} years)</label>
                    <input
                        type="range"
                        min="3"
                        max="35"
                        step="1"
                        class="w-full h4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        v-model="duration"
                    />
               
                <div class="text-gray-600 dark:text-gray-300 mt-2">
                    <div class="text-gray-400">Your monthly payment</div>
                    <Price :price="monthlyPayment" class="text-xl font-bold" />
                </div>
                
                <div class="mt-2 text-gray-500">
                    <div class="flex justify-between">
                        <div>Total paid</div>
                        <div><Price :price="totalPaid" class="font-medium" /></div>
                    </div>
                </div>
                <div class="mt-2 text-gray-500">
                    <div class="flex justify-between">
                        <div>Principal paid</div>
                        <div><Price :price="listing.price" class="font-medium" /></div>
                    </div>
                </div>
                <div class="mt-2 text-gray-500">
                    <div class="flex justify-between">
                        <div>Interest paid</div>
                        <div><Price :price="totalInterest" class="font-medium" /></div>
                    </div>
                </div>
            </Box>


            <!-- <Box>
                <template #header>Action</template>
                <Link :href="route('listing.edit', { listing: listing.id })">
                    Edit
                </Link>

                <Link
                    :href="route('listing.destroy', { listing: listing.id })"
                    method="DELETE"
                    as="button"
                >
                    Delete
                </Link>
            </Box> -->
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
});

const interestRate = ref(2.5);
const duration = ref(25);

const {monthlyPayment,totalPaid,totalInterest}  = useMonthlyPayment(props.listing.price,interestRate,duration);
</script>