<template lang="">
    <MainLayout >
        <div>
            Message : {{message}}
        </div>
    </MainLayout>
</template>
<script setup>
import { ref } from "vue";
import MainLayout from "../Layouts/MainLayout.vue";
defineProps({
  message: {
    type: String,
  },
});
</script>
