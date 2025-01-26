<template lang="">
    <div>
        Filter
       
       <div class="flex flex-wrap gap-2">
           <div class="flex flex-nowrap items-center gap-2">        
                <input type="checkbox" id="is_draft" v-model="formFilter.is_draft" >
                <label for="is_draft">Draft</label>
           </div>
           <div class="flex flex-nowrap items-center gap-2">        
                <input type="checkbox" id="is_deleted" v-model="formFilter.is_deleted" >
                <label for="is_deleted">Deleted</label>
           </div>
           <div>
                <select v-model="formFilter.by" class="input-filter-l w-24">
                    <option value="created_at">Added</option>
                    <option value="price">Price</option>
                </select>
                <select v-model="formFilter.order" class="input-filter-r w-32">
                    <option
                        v-for="option in sortOptions" 
                        :key="option.value" :value="option.value"
                    >
                        {{ option.label }}
                    </option>
                </select>
            </div>
       </div>
    </div>
</template>
<script setup>
import { useForm,router } from '@inertiajs/vue3';
import {reactive,watch,computed } from 'vue';
import { debounce } from 'lodash';

const sortLabels = {
  created_at: [
    {
      label: 'Latest',
      value: 'desc',
    },
    {
      label: 'Oldest',
      value: 'asc',
    },
  ],
  price: [
    {
      label: 'Pricey',
      value: 'desc',
    },
    {
      label: 'Cheapest',
      value: 'asc',
    }
  ],
}

const sortOptions = computed(() => sortLabels[formFilter.by])

const props = defineProps({
    filters:Array
})

const formFilter = reactive({
    is_draft:props.filters?.is_draft??false,
    is_deleted:props.filters?.is_deleted??false,
    by: 'created_at',
    order: 'desc',
});


// watch([()=>formFilter.is_draft,()=>formFilter.is_deleted],(newValue,oldValue)=>{
//     // console.log(formFilter);
//     // console.log(newValue,oldValue);
// })

watch(
    formFilter,
    debounce(()=>{
        router.get(route("realtor.listing.index"),formFilter,{
            preserveState:true,
            preservScroll:true
        });
    },1000)
);

</script>
<style lang="">
    
</style>