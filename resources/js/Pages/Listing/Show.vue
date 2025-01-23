<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">
                No Image
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>Basic Info</template>
                <Price :price="listing.price" class="text-xl font-bold" />
                <ListingSpace :listing="listing" />
                <ListingAddress :listing="listing" />
            </Box>
            <Box>
                <template #header>Offer</template>
                Make an offer
            </Box>
            <Box>
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
            </Box>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
defineProps({
    listing: Object,
});
</script>