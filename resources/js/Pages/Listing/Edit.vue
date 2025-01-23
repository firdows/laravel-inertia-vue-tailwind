<template lang="">
    <div>
        <h1>Update</h1>
    </div>
    <form @submit.prevent="create">
        
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label for="" class="block mb-1 text-gray-500 font-medium">Beds : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model.number="form.beds" />
                <div class="text-red-600" v-show="true || form.errors.beds">{{form.errors.beds}}555</div>
            </div>
            <div class="col-span-2">
                <label for="" class="block mb-1 text-gray-500 font-medium">Baths : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.baths"/>
                <div class="error" v-show="form.errors.baths">{{form.errors.baths}}</div>
            </div>
            <div class="col-span-2">
                <label for="" class="block mb-1 text-gray-500 font-medium">Area : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.area"/>
                <div class="error" v-show="form.errors.baths">{{form.errors.area}}</div>
            </div>
            <div class="col-span-2">
                <label for="" class="block mb-1 text-gray-500 font-medium">City : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.city"/>
                <div class="error" v-show="form.errors.city">{{form.errors.city}}</div>
            </div>
            <div class="col-span-2">
                <label for="" class="block mb-1 text-gray-500 font-medium">Code : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.code"/>
                <div class="error" v-show="form.errors.code">{{form.errors.code}}</div>
            </div>
            <div class="col-span-3">
                <label for="" class="block mb-1 text-gray-500 font-medium">Street : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.street"/>
                <div class="error" v-show="form.errors.street">{{form.errors.street}}</div>
            </div>
            <div class="col-span-3">
                <label for="" class="block mb-1 text-gray-500 font-medium">Street Nr : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.street_nr"/>
                <div class="error" v-show="form.errors.street_nr">{{form.errors.street_nr}}</div>
            </div>
            <div class="col-span-6">
                <label for="" class="block mb-1 text-gray-500 font-medium">Price : </label> 
                <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600" v-model="form.price"/>
                <div class="error" v-show="form.errors.price">{{form.errors.price}}</div>
            </div>
            <div class="col-span-6">
                <button type="submit" class="p-2 border-md bg-green-600 rounded-md hover:bg-green-900 text-white">Submit</button>
            </div>
        </div>

       

    </form>
</template>
<script setup>
import { reactive } from "vue";
// import { Inertia } from '@inertiajs/inertia'
import { router, useForm } from "@inertiajs/vue3";
const props = defineProps({
    listing: Object,
});
const form = useForm({
    beds: props.listing.beds || 0,
    baths: props.listing.baths || 0,
    area: props.listing.area || 0,
    city: props.listing.city || 0,
    street: props.listing.street || 0,
    code: props.listing.code || 0,
    street_nr: props.listing.street_nr || 0,
    price: props.listing.price || 0,
});
const create = () =>
    form.put(route("listing.update", { listing: props.listing.id }));
</script>
<style scoped>
label {
    margin-right: 2em;
}
div {
    padding: 3px;
}
span.error {
    color: red;
}
</style>

