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
        <p class="text-xs mt-1">
            Monthly: <app-price :price="getMonthlyPayment"></app-price>
        </p>
    </div>
</template>

<script setup>
import AppPrice from "@/Components/UI/AppPrice.vue";
import { userMonthlyPayment } from "@/Composables/useMonthlyPayment.js";

const props = defineProps({
    home: {
        type: Object,
        required: true,
    },
});

const rate = 2.5;
const duration = 25;
const { getMonthlyPayment } = userMonthlyPayment(
    props.home.price,
    rate,
    duration
);
</script>
