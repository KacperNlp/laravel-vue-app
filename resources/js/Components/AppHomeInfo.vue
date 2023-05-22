<template>
    <div class="text-gray-500 dark:text-gray-400">
        <div class="mb-2 text-sm">
            <span><strong>Beds:</strong> {{ home.beds }}</span
            ><span class="px-2">|</span
            ><span><strong>Baths:</strong> {{ home.baths }}</span
            ><span class="px-2">|</span
            ><span><strong>Area:</strong> {{ home.area }} m²</span>
        </div>
        <p class="pb-2">City: {{ home.city }}</p>
        <p>
            Price: <strong><app-price :price="home.price"></app-price></strong>
        </p>
    </div>
</template>

<script setup>
import AppPrice from "@/Components/UI/AppPrice.vue";

const props = defineProps({
    home: {
        type: Object,
        required: true,
    },
});
</script>
