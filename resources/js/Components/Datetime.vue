<template>
    <span>{{ resDatetime }}</span>
</template>

<script setup>
import { computed } from "vue";
const props = defineProps({
    datetime: Date,
});
// const formattedPrice = computed(
//     () => Number(props.price).toLocaleString('th-TH', {
//         style: 'currency',
//         currency: 'THB',
//         maximumFractionDigits: 2,
//     }),
// )

const resDatetime = computed(() => new Date(props.datetime).toDateString()
    // new Date(props.datetime).toLocaleDateString("th-TH", {
    //     year: "numeric",
    //     month: "long",
    //     day: "numeric",
    //     hour: "numeric",
    //     minute: "numeric",
    // })
);
</script>
