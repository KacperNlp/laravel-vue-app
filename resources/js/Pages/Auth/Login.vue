<template>
    <form
        @submit.prevent="submit"
        class="max-w-xl px-4 mx-auto mt-16 mb-2 flex flex-col gap-4"
    >
        <app-form-element
            labelText="Email (username)"
            :error="loginForm.errors.email"
            v-model="loginForm.email"
        ></app-form-element>
        <app-form-element
            labelText="Password"
            inputType="password"
            :error="loginForm.errors.password"
            v-model="loginForm.password"
        ></app-form-element>
        <div class="flex">
            <button type="submit" class="btn-primary mx-auto">Login</button>
        </div>
    </form>
    <div class="flex">
        <Link :href="route('register')" class="btn-primary mx-auto"
            >Register</Link
        >
    </div>
</template>

<script setup>
import AppFormElement from "@/Components/UI/AppFormElement.vue";
import { Link, useForm } from "@inertiajs/vue3";

const loginForm = useForm({
    email: null,
    password: null,
});

const submit = () => {
    loginForm.post(route("login.store"));
};
</script>
