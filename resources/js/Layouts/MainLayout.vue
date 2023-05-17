<template>
    <header>
        <Link href="/">Home Page</Link>
        <Link href="/hello">Show Page</Link>
    </header>
    <div>Time: {{ timer }}</div>
    <slot />
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const timer = ref(0);

setInterval(() => timer.value++, 1000);
</script>
