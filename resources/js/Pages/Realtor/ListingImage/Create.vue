<template lang="">
    <div>
        Create Image
    </div>
    <!-- <form @submit.prevent="submit"> -->
    <form method="POST" :action="route('realtor.listing.image.store', { listing: listing.id })" enctype="multipart/form-data">
        <input type="file" multiple name='images[]' />
        <button type="submit" class="btn-primary">Upload</button>
    </form>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';

defineProps({ listing: Object })

// const form = useForm({
//     file:null
// })

// const submit = () => {
//     form.post(route('realtor.listing.image.store', { listing: listing.id }));
// }
</script>
