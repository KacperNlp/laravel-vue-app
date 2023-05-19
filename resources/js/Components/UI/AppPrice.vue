<template>
    <span>{{ getPrice }}</span>
</template>

<script setup>
import { computed, defineProps } from "vue";

const props = defineProps({
    price: {
        type: Number,
        required: true,
        default: 0,
    },
});

const getPrice = computed(() => {
    const price = props.price.toLocaleString("en-US", {
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    });
    return price;
});
</script>
