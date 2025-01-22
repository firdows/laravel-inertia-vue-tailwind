<template lang="">
        <div>
            Message : {{message}}
        </div>
</template>

<script setup>
import { ref } from "vue";
defineProps({
  message: {
    type: String,
  },
});
</script>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
export default {
  layout: MainLayout,
};
</script>
