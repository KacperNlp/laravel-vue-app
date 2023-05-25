<template>
    <div class="flex justify-center gap-3 mt-8">
        <Link
            v-for="(link, id) in links"
            :href="link.url"
            :key="id"
            v-html="link.label"
            class="py-2 px-4 border rounded-md"
            :class="{ 'bg-indigo-500 text-gray-200': link.active }"
        />
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>
