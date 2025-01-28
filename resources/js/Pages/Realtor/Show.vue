<template>
  <div class="mt-2">
    <Link :href="route('realtor.listing.index')">← Go back to Listings</Link>
  </div>

  <div class="flex mt-2 flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box v-if="!hasOffers" class="flex md:col-span-7 items-center">
      <div class="w-full text-center font-medium text-gray-500">No offers</div>
    </Box>

    <div v-else class="md:col-span-7 items-center">
      <OfferItem
        v-for="offer in listing.offers"
        :key="offer.id"
        class="mb-4"
        :offer="offer"
        :listing-price="listing.price"
      />
    </div>

    <Box class="md:col-span-5 flex flex-col gap-4">
      <template #header>Basic Info</template>
      <Price :price="listing.price" class="text-2xl font-bold" />
      <ListingSpace :listing="listing" />
      <ListingAddress :listing="listing" />
    </Box>
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
import OfferItem from "./Show/Components/OfferItem.vue";

const props = defineProps({
  listing: Object,
});

const hasOffers = computed(() => props.listing.offers.length);
</script>