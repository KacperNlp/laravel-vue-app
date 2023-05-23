<template>
    <form
        @submit.prevent="submit"
        class="max-w-xl px-4 mx-auto mt-16 mb-2 flex flex-col gap-4"
    >
        <app-form-element
            labelText="Username"
            :error="registerForm.errors.username"
            v-model="registerForm.username"
        ></app-form-element>
        <app-form-element
            labelText="Emai"
            :error="registerForm.errors.email"
            v-model="registerForm.email"
        ></app-form-element>
        <app-form-element
            labelText="Password"
            inputType="password"
            :error="registerForm.errors.password"
            v-model="registerForm.password"
        ></app-form-element>
        <app-form-element
            labelText="Repeat Password"
            inputType="password"
            :error="registerForm.errors.password_confirmation"
            v-model="registerForm.password_confirmation"
        ></app-form-element>
        <div class="flex">
            <button type="submit" class="btn-primary mx-auto">
                Create account
            </button>
        </div>
    </form>
    <div class="flex">
        <Link :href="route('login')" class="btn-primary mx-auto">Login</Link>
    </div>
</template>

<script setup>
import AppFormElement from "@/Components/UI/AppFormElement.vue";
import { useForm, Link } from "@inertiajs/vue3";

const registerForm = useForm({
    username: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    registerForm.post("");
};
</script>
