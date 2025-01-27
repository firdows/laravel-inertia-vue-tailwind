<template lang="">
    <Box>
        <template #header>Upload Image</template>
        <form @submit.prevent="submit">
       
            <input type="file" multiple @input="addFiles"/>
            
            <button type="submit" class="btn-outline">Upload</button>
            <button type="reset" class="btn-outline" @click="reset">Reset</button>
        </form>
    </Box>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import Box from "@/Components/UI/Box.vue";

const props = defineProps({ listing: Object });

const form = useForm({
    images: []
});

const submit = () => {
    form.post(route('realtor.listing.image.store', { listing: props.listing.id }), {
        onSuccess: () => form.reset('images')
    });
}

const addFiles = (e) => {
    // console.log(e.target.files);
    for (const image of e.target.files) {
        // console.log(image);
        form.images.push(image);
    }
}
const reset = () => form.reset('images')
</script>
