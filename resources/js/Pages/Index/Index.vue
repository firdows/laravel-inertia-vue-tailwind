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

