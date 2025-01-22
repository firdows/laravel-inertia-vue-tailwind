<template lang="">

    <Link :href="route('listing.create')">Create</Link>

  <div v-for="listing in listings" :key="listing.id">
    <Link :href="route('listing.show',{listing:listing.id})">
      <ListingAddress :listing="listing" />
    </Link> | 

    <Link :href="route('listing.edit', { listing: listing.id })"> Edit </Link> | 
    <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button"> Delete </Link>
  </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";

defineProps({
    listings: Array,
});
</script>
<style lang="">
</style>