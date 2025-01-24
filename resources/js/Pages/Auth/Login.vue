<template lang="">
    <div class="pb-4">
       
        <form @submit.prevent="login">            
            <div class="w-full md:w-1/2 xl:w-1/3  mx-auto flex flex-col gap-2 mt-2">
                <h1 class="text-2xl">Login</h1>
                <div class="">
                    <label for="email" class="label">Email (username)</label>
                    <input id="email" type="text" class="input" v-model="form.email"/>
                    <div class="input-error" v-show="form.errors.email">{{form.errors.email}}</div>
                </div>
                <div class="">
                    <label for="password" class="label">Password</label>
                    <input id="password" type="password" class="input" v-model="form.password"/>
                    <div class="input-error" v-show="form.errors.password">{{form.errors.password}}</div>
                </div>
                <div class="">
                    <input type="checkbox" id="remember"/> <label for="remember" >Remember</label>
                </div>
                <div class="">
                    <button type="submit" class="btn-primary w-full">Login</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email:null,
    password:null,
});

const login = () => form.post(route('login'));

</script>