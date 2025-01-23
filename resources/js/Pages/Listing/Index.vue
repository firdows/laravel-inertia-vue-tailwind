<template lang="">

<p class="mt-5">
    <Link :href="route('listing.create')" class="border-m p-3 rounded-md m-3 bg-sky-500 hover:bg-sky-700 text-white">Create</Link>
</p>
<div class="mt-5">
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="route('listing.show',{listing:listing.id})">
      <ListingAddress :listing="listing" />
    </Link> | 

    <Link :href="route('listing.edit', { listing: listing.id })"> Edit </Link> | 
    <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button"> Delete </Link>
  </div>
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