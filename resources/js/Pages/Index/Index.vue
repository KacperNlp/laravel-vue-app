<template>
    <h1>Main Page</h1>
    <p>{{ message }}</p>
</template>

<script setup>
defineProps({
    message: String,
});
</script>

<script>
import MainLayout from "../../Layouts/MainLayout.vue";

export default {
    layout: MainLayout,
};
</script>
