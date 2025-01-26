<template lang="">
    <div>
        Filter
       
       <div class="flex flex-wrap gap-2">
           <div class="flex flex-nowrap items-center gap-2">        
                   <input type="checkbox" id="is_draft" v-model="is_draft" @change.prevent="onFilter">
                   <label for="is_draft">Draft</label>
           </div>
           <div class="flex flex-nowrap items-center gap-2">        
                   <input type="checkbox" id="is_deleted" v-model="is_deleted" @change.prevent="onFilter">
                   <label for="is_deleted">Deleted</label>
           </div>
       </div>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';

const formFilter = useForm({
    is_draft:null,
    is_deleted:null,
});

const onFilter = () =>{
    formFilter.get(route('realtor.listing.index'),{
        preserveScroll:true,
        preserveState:true,
    });
}


</script>
<style lang="">
    
</style>