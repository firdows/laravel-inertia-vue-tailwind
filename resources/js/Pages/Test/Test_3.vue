<script setup>
import { ref, nextTick } from 'vue'

const count = ref(0)

async function increment() {
    count.value++

    // DOM not yet updated
    console.log(document.getElementById('counter').textContent) // 0

    await nextTick()
    // DOM is now updated
    console.log(document.getElementById('counter').textContent) // 1
}
</script>

<template>
    <div>
        <button id="counter" @click="increment" class="p-2 m-2 bottom-2 rounded-md bg-slate-400">{{ count }}</button>
    </div>
</template>