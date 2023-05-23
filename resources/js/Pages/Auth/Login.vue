<template>
    <form
        @submit.prevent="submit"
        class="max-w-xl px-4 mx-auto my-16 flex flex-col gap-4"
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
</template>

<script setup>
import AppFormElement from "@/Components/UI/AppFormElement.vue";
import { useForm } from "@inertiajs/vue3";

const loginForm = useForm({
    email: null,
    password: null,
});

console.log(loginForm);

const submit = () => {
    loginForm.post(route("login.store"));
};
</script>
