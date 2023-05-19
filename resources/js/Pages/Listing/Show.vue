<template>
    <div>
        <app-home-info :home="home"></app-home-info>
        <Link :href="route('listing.index')">Go Back</Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppHomeInfo from "@/Components/AppHomeInfo.vue";

defineProps({
    home: {
        type: Object,
        required: true,
    },
});
</script>
