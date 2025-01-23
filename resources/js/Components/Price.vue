<template>
    <span>{{ formattedPrice }}</span>
</template>

<script setup>
import { computed } from 'vue'
const props = defineProps({
    price: [Number, String],
})
const formattedPrice = computed(
    () => Number(props.price).toLocaleString('th-TH', {
        style: 'currency',
        currency: 'THB',
        maximumFractionDigits: 2,
    }),
)
</script>