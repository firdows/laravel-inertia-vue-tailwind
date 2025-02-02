<template>
    <div id="app">

        <button v-for="(comp, key) in asyncComponents" :key="key" @click="componentToRender = key"
            class="border rounded-md bg-slate-300 p-3 m-2">{{ key }}
        </button>

        <keep-alive>
            <component :is="currentComponent" :title="componentToRender" />
        </keep-alive>
    </div>
</template>



<script setup>
// https://www.monterail.com/blog/understanding-dynamic-components-in-vue-3

import { ref, computed, reactive, defineAsyncComponent } from 'vue';

const asyncComponents = {
    'Test_1': defineAsyncComponent(() => import('./Test_1.vue')),
    'Test_2': defineAsyncComponent(() => import('./Test_2.vue')),
    'Test_3': defineAsyncComponent(() => import('./Test_3.vue')),
}
const componentToRender = ref('Test_1')

const currentComponent = computed(() => {
    console.log(asyncComponents);
    return asyncComponents[componentToRender.value]
})

</script>