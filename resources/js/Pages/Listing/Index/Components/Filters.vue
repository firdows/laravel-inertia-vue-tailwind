<template lang="">
    <form @submit.prevent="filterSumbit">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">

            <div class="flex flex-nowrap items-center ">
                <input v-model="filterForm.priceFrom" type="text" placeholder="Price from" class="input-filter-l w-28">
                <input v-model="filterForm.priceTo" type="text" placeholder="Price to" class="input-filter-r w-28">
            </div>

            <div class="flex flex-nowrap items-center ">
                <select v-model="filterForm.beds" class="input-filter-l  w-28">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n">{{n}}</option>
                    <option >6+</option>
                </select>
                <select v-model="filterForm.baths" class="input-filter-r  w-28">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n">{{n}}</option>
                    <option >6+</option>
                </select>
            </div>

            <div class="flex flex-nowrap items-center ">
                <input v-model="filterForm.areaFrom" type="text" placeholder="Area from"  class="input-filter-l  w-28">
                <input v-model="filterForm.areaTo" type="text" placeholder="Area to"   class="input-filter-r  w-28">
            </div>

            <button type="submit" class="btn-normal" :class="{'bg-indigo-600 dark:bg-gray-200':activeBtn}">Filter</button>
            <button type="reset"  class="ml-2" @click="clear" >Clear</button>

        </div>
    </form>
</template>
<script setup>
import { useForm,router } from '@inertiajs/vue3';
import {ref,reactive} from "vue";

const activeBtn = ref(false);
const props = defineProps({
    filters:Object
});

const filterForm = useForm({
    priceFrom:props.filters?.priceFrom??null,
    priceTo:props.filters?.priceTo??null,
    beds:props.filters?.beds??null,
    baths:props.filters?.baths??null,
    areaFrom:props.filters?.areaFrom??null,
    areaTo:props.filters?.areaTo??null,
});

const filterSumbit = () => {
    // console.log(filters.length);
    filterForm.get(route('listing.index'),{
        preserveState:true,
        preserveScroll:true,
        onSuccess:()=>{
            activeBtn.value =true;
        }
    })
};

const clear = () =>{
    // filterForm.areaFrom = null;
    // filterForm.areaTo = null;
    filterForm.reset();
    // filterForm.get(route('listing.index'),{
    //     preserveState:true,
    //     preserveScroll:true,
    // })
    router.get(route('listing.index'));
}


</script>