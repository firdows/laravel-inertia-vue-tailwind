<template lang="">    
    <form @submit.prevent="create">

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label for="" class="label">Beds : </label> 
                <input type="text" class="input" v-model.number="form.beds" />
                <div class="input-error" v-show="form.errors.beds">{{form.errors.beds}}</div>
            </div>
            <div class="col-span-2">
                <label for="" class="label">Baths : </label> 
                <input type="text" class="input" v-model="form.baths"/>
                <div class="input-error" v-show="form.errors.baths">{{form.errors.baths}}</div>
            </div>
            <div class="col-span-2">
                <label for="" class="label">Area : </label> 
                <input type="text" class="input" v-model="form.area"/>
                <div class="input-error" v-show="form.errors.baths">{{form.errors.area}}</div>
            </div>
            <div class="col-span-3">
                <label for="" class="label">City : </label> 
                <input type="text" class="input" v-model="form.city"/>
                <div class="input-error" v-show="form.errors.city">{{form.errors.city}}</div>
            </div>
            <div class="col-span-3">
                <label for="" class="label">Code : </label> 
                <input type="text" class="input" v-model="form.code"/>
                <div class="input-error" v-show="form.errors.code">{{form.errors.code}}</div>
            </div>
            <div class="col-span-3">
                <label for="" class="label">Street : </label> 
                <input type="text" class="input" v-model="form.street"/>
                <div class="input-error" v-show="form.errors.street">{{form.errors.street}}</div>
            </div>
            <div class="col-span-3">
                <label for="" class="label">Street Nr : </label> 
                <input type="text" class="input" v-model="form.street_nr"/>
                <div class="input-error" v-show="form.errors.street_nr">{{form.errors.street_nr}}</div>
            </div>
            <div class="col-span-6">
                <label for="" class="label">Price : </label> 
                <input type="text" class="input" v-model="form.price"/>
                <div class="input-error" v-show="form.errors.price">{{form.errors.price}}</div>
            </div>
            <div class="col-span-6">
                <button type="submit" class="btn-primary">Submit</button>
            </div>
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
const create = () => form.post(route("listing.store"));
</script>
<!-- <style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 3px;
}

span.error {
    color: red;
}
</style> -->
