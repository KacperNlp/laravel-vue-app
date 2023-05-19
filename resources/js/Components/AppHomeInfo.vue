<template>
    <div class="text-gray-500 dark:text-gray-400">
        <div class="mb-2 text-sm">
            <span><strong>Beds:</strong> {{ home.beds }}</span
            ><span class="px-2">|</span
            ><span><strong>Baths:</strong> {{ home.baths }}</span
            ><span class="px-2">|</span
            ><span><strong>Aerea:</strong> {{ home.area }} m²</span>
        </div>
        <p class="pb-2">City: {{ home.city }}</p>
        <p>
            Price: <strong>${{ getPrice }}</strong>
        </p>
    </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    home: {
        type: Object,
        required: true,
    },
});

const getPrice = computed(() => {
    let price = props.home.price.toString().split(".");
    price[0] = price[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return price.join(",");
});
</script>
