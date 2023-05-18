<template>
    <h1>Main Page</h1>
    <p>{{ message }}</p>
</template>

<script setup>
defineProps({
    message: String,
});
</script>
