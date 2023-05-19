<template>
    <header class="header">
        <Link href="/">Home Page</Link>
        <Link href="/hello">Show Page</Link>
        <Link :href="route('listing.index')">Show all Homes!</Link>
        <Link :href="route('listing.create')">Sell home</Link>
    </header>
    <div v-if="isVisible" class="success">
        {{ successMessage }}
    </div>
    <slot />
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref, onUpdated } from "vue";

const TIME_TO_HIDE_MESSAGE = 3000;

const page = usePage();
const isVisible = ref(false);

const successMessage = computed(() => page.props.flash.success);

onUpdated(() => {
    isVisible.value = !isVisible.value ? !!page.props.flash.success : false;

    if (isVisible.value) {
        setTimeout(hideSuccessMessage, TIME_TO_HIDE_MESSAGE);
    }
});

const hideSuccessMessage = () => {
    isVisible.value = false;
};
</script>

<style>
.header {
    display: flex;
    flex-direction: row;
    gap: 20px;
    margin-bottom: 20px;
}

.success {
    padding: 10px 20px;
    background: #079407;
    color: #fff;
    transition: 0.3s;
}
</style>
