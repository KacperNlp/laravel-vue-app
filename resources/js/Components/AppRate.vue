<template>
    <div>
        <label class="flex flex-col gap-2 mb-4">
            Interest rate ({{ rate }}%)
            <input
                v-model.number="rate"
                type="range"
                min="0.1"
                max="30"
                step="0.1"
                class="range-input"
            />
        </label>
    </div>
    <div>
        <label class="flex flex-col gap-2">
            Duration ({{ getYearsString }})
            <input
                v-model.number="duration"
                type="range"
                min="1"
                max="35"
                step="1"
                class="range-input"
            />
        </label>
    </div>
    <div class="my-4">
        <p class="text-gray-500">You will have to pay:</p>
        <app-price class="text-xl" :price="getMonthlyPayment"></app-price>
    </div>
    <div class="text-xs">
        <div class="flex gap-2">
            <p>Total Paid:</p>
            <app-price :price="totalPaid"></app-price>
        </div>
        <div class="flex gap-2">
            <p>Total Interest:</p>
            <app-price :price="totalInterest"></app-price>
        </div>
    </div>
</template>
<script setup>
import { ref, computed, defineProps } from "vue";
import AppPrice from "./UI/AppPrice.vue";

import { userMonthlyPayment } from "@/Composables/useMonthlyPayment.js";

const props = defineProps({
    price: {
        type: Number,
        required: true,
    },
});

const rate = ref(2.5);
const duration = ref(25);

const getYearsString = computed(() => {
    const text =
        duration.value === 1
            ? `${duration.value} year`
            : `${duration.value} years`;
    return text;
});

const { getMonthlyPayment, totalPaid, totalInterest } = userMonthlyPayment(
    props.price,
    rate,
    duration
);
</script>
