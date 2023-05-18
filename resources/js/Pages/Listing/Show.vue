<template>
    <div>
        <app-home-address :home="home"></app-home-address>
        <Link href="/listing">Go Back</Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppHomeAddress from "@/Components/AppHomeAddress.vue";

defineProps({
    home: {
        type: Object,
        required: true,
    },
});
</script>
