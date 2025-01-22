<template lang="">
    <Link href="/">Main Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>&nbsp;
    <Link href="/listing">Listing Page</Link>&nbsp;

    <div>
        The page with time : {{timer}}
    </div>
    <slot>
        <p>This is the default slot.</p>
    </slot>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const timer = ref(0);
setInterval(() => {
  timer.value++;
}, 1000);
</script>
