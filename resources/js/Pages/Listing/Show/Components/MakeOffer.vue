<template lang="">
    <Box>
        <template #header>Make an Offers</template>
        <div class="">
            <form @submit.prevent="offerSubmit">
                <input v-model.number="form.amount" type="text" class="input mt-2"  />
                <input
                        v-model.number="form.amount"
                        type="range"
                        :min="min"
                        :max="max"
                        step="1000"
                        class="w-full h4 mt-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        v-model="interestRate"
                    />
                <p v-if="form.errors.amount" class="text-red-600 text-xs">{{form.errors.amount}}</p>
                <button type="submit" class="btn-outline w-full mt-2 text-sm">
                    Make an Offer
                </button>
            </form>
        </div>
        <div class="flex justify-between text-gray-500 mt-2">
            <div>
                Difference
            </div>
            <Price :price="difference"/>            
        </div>

    </Box>
</template>
<script setup>
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import { useForm } from "@inertiajs/vue3";
import { computed, watch } from "vue";
import { debounce } from "lodash";

const props = defineProps({
    listingId:Number,
    price:Number
})

const form = useForm({
    amount:props.price
});

const difference = computed(()=>form.amount - props.price);
const min = computed(()=>Math.round(props.price/2));
const max = computed(()=>Math.round(props.price*2));

const offerSubmit = () => form.post(
    route("listing.offer.store",{
        listing:props.listingId
    })
);

const emit = defineEmits(['offerUpdated'])

watch(
    ()=>form.amount,
    debounce((value) => emit('offerUpdated', value),200)
)
</script>
