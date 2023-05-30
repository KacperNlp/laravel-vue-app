<template>
    <h1 class="text-2x md:text-3xl font-semibold mb-8">Your Homes!</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <app-card v-for="home in homes" :key="home.id">
            <app-home-info :home="home"></app-home-info>
        </app-card>
    </div>
    <div class="my-8 font-semibold text-xl md:text-2xl">
        All:
        <app-price :price="userWholeWallet"></app-price>
    </div>
</template>

<script setup>
import { defineProps, computed } from "vue";

import AppCard from "@/Components/UI/AppCard.vue";
import AppPrice from "@/Components/UI/AppPrice.vue";
import AppHomeInfo from "@/Components/AppHomeInfo.vue";

const props = defineProps({
    homes: Object,
});

const userWholeWallet = computed(() => {
    let wallet = 0;
    for (const home of props.homes) {
        wallet += home.price;
    }

    return wallet;
});
</script>
