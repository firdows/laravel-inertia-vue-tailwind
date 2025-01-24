<template lang="">
    <div class="pb-4">
        <form @submit.prevent="login">
            <div
                class="w-full md:w-1/2 xl:w-1/3 mx-auto flex flex-col gap-2 mt-2"
            >
                <h1 class="text-2xl">Register</h1>
                <div class="">
                    <label for="name" class="label">Name</label>
                    <input
                        id="name"
                        type="text"
                        class="input"
                        v-model="form.name"
                    />
                    <div class="input-error" v-show="form.errors.name">
                        {{ form.errors.name }}
                    </div>
                </div>
                <div class="">
                    <label for="email" class="label">Email</label>
                    <input
                        id="email"
                        type="text"
                        class="input"
                        v-model="form.email"
                    />
                    <div class="input-error" v-show="form.errors.email">
                        {{ form.errors.email }}
                    </div>
                </div>
                <div class="">
                    <label for="password" class="label">Password</label>
                    <input
                        id="password"
                        type="password"
                        class="input"
                        v-model="form.password"
                    />
                    <div class="input-error" v-show="form.errors.password">
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="">
                    <label for="password_confirmation" class="label"
                        >Password Comfirm</label
                    >
                    <input
                        id="password_confirmation"
                        type="password"
                        class="input"
                        v-model="form.password_confirmation"
                    />
                    <div
                        class="input-error"
                        v-show="form.errors.password_confirmation"
                    >
                        {{ form.errors.password_confirmation }}
                    </div>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn-primary w-full">
                        Register
                    </button>
                </div>

                <div class="mt-2 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-500" >Already have an accont? Click here</Link>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm,Link } from "@inertiajs/vue3";


const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const login = () =>
    form.post(route("user-account.store"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            form.reset("password", "password_confirmation");
        },
    });
</script>
