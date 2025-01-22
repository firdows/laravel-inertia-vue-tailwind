<template lang="">
    <Link href="/">Main Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>&nbsp;
    <Link href="/listing">Listing Page</Link>&nbsp;

    <div v-if="flashSuccess" class="success">
        <!-- {{ $page.props.flash.success }} -->
        {{ flashSuccess }}
      </div>

    <div>
        x*2 : {{y}}
    </div>
    <div>
        The page with time : {{timer}}
    </div>
    <slot>
        <p>This is the default slot.</p>
    </slot>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const timer = ref(0);
setInterval(() => {
    timer.value++;
}, 1000);

const x = ref(0);
const y = computed(() => x.value * 2);
const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>

<style scoped>
.success {
    background-color: green;
    padding: 10px;
    color: #fff;
}
</style>
