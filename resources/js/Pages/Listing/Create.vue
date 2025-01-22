<template lang="">
    <div>
        <h1>Create</h1>
    </div>
    <form @submit.prevent="create">
        <div>
            <label for="">Beds : </label> 
            <input type="text" v-model.number="form.beds"/>
            <span class="error" v-show="form.errors.beds">{{form.errors.beds}}</span>
        </div>
        <div>
            <label for="">Baths : </label> 
            <input type="text" v-model="form.baths"/>
            <span class="error" v-show="form.errors.baths">{{form.errors.baths}}</span>
        </div>
        <div>
            <label for="">Area : </label> 
            <input type="text" v-model="form.area"/>
            <span class="error" v-show="form.errors.baths">{{form.errors.area}}</span>
        </div>
        <div>
            <label for="">City : </label> 
            <input type="text" v-model="form.city"/>
            <span class="error" v-show="form.errors.city">{{form.errors.city}}</span>
        </div>
        <div>
            <label for="">Code : </label> 
            <input type="text" v-model="form.code"/>
            <span class="error" v-show="form.errors.code">{{form.errors.code}}</span>
        </div>
        <div>
            <label for="">Street : </label> 
            <input type="text" v-model="form.street"/>
            <span class="error" v-show="form.errors.street">{{form.errors.street}}</span>
        </div>
        <div>
            <label for="">Street Nr : </label> 
            <input type="text" v-model="form.street_nr"/>
            <span class="error" v-show="form.errors.street_nr">{{form.errors.street_nr}}</span>
        </div>
        <div>
            <label for="">Price : </label> 
            <input type="text" v-model="form.price"/>
            <span class="error" v-show="form.errors.price">{{form.errors.price}}</span>
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
span.error{
    color:red;
}
</style>

