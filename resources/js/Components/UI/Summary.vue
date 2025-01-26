<template lang="">
    <p class="text-skate-600 text-sm mt-2 mb-2">
            Showing {{ models.from }} to {{ models.to }} of
            {{ models.total }} results
        </p>
</template>
<script setup>
defineProps({
    models:Object
})
</script>