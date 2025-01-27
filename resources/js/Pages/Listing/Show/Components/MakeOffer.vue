<template lang="">
    <Box>
        <template #header>Make an Offers</template>
        <div class="">
            <form>
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
import { computed } from "vue";

const props = defineProps({
    listingId:Number,
    price:Number
})

const form = useForm({
    amount:props.price
});

const difference = computed(()=>form.amount - props.price);
const min = computed(()=>props.price/2);
const max = computed(()=>props.price*2);

</script>
