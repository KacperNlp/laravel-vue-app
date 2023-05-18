<template>
    <div>
        <h1>All homes for sale:</h1>
        <ul>
            <li v-for="home in homes" @key="home.id">
                <app-home-address :home="home"></app-home-address>
                <Link :href="`/listing/${home.id}`">Details</Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppHomeAddress from "@/Components/AppHomeAddress.vue";

defineProps({
    homes: {
        type: Array,
        required: true,
        default: [],
    },
});
</script>
