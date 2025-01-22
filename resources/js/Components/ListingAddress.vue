<template>
    <span>
        {{ listing.street }} {{ listing.street_nr }}, {{ listing.city }}, for
        ${{ listing.price }}
        <Link :href="`/listing/${listing.id}/edit`"> Edit</Link>
    </span>
</template>


<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    listing: Object,
});
</script>