<template lang="">
    <div>
        <h1>Create</h1>
    </div>
    <form @submit.prevent="create">
        <div>
            <label for="">Beds : </label> 
            <input type="text" v-model.number="form.beds"/>
        </div>
        <div>
            <label for="">Baths : </label> 
            <input type="text" v-model="form.baths"/>
        </div>
        <div>
            <label for="">Area : </label> 
            <input type="text" v-model="form.area"/>
        </div>
        <div>
            <label for="">City : </label> 
            <input type="text" v-model="form.city"/>
        </div>
        <div>
            <label for="">Code : </label> 
            <input type="text" v-model="form.code"/>
        </div>
        <div>
            <label for="">Street : </label> 
            <input type="text" v-model="form.street"/>
        </div>
        <div>
            <label for="">Street Nr : </label> 
            <input type="text" v-model="form.street_nr"/>
        </div>
        <div>
            <label for="">Price : </label> 
            <input type="text" v-model="form.price"/>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>

       

    </form>
</template>
<script setup>
import { reactive } from "vue";
// import { Inertia } from '@inertiajs/inertia'
import { router, useForm } from "@inertiajs/vue3";
const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: null,
    street: null,
    code: null,
    street_nr: null,
    price: 0,
});
const create = () => form.post("/listing");
</script>
<style scoped>
label {
    margin-right: 2em;
}
div {
    padding: 3px;
}
</style>

