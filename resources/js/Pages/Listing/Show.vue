<template>
    <div>
        <div class="grid grid-cols-12 gap-8">
            <app-card class="col-span-12 md:col-span-7">
                <div class="h-full flex items-center justify-center">
                    <p class="font-medium text-gray-400">No images</p>
                </div>
            </app-card>
            <div class="col-span-12 md:col-span-5 grid gap-4">
                <app-card>
                    <template #header>
                        <p class="mb-4">Basic info</p>
                    </template>
                    <strong class="block mb-4 text-xl">
                        <app-price :price="home.price"></app-price>
                    </strong>
                    <div class="mb-2 text-sm">
                        <strong>{{ home.beds }} beds</strong
                        ><span class="px-2">|</span
                        ><strong>{{ home.baths }} baths</strong
                        ><span class="px-2">|</span
                        ><strong>{{ home.area }} m²</strong>
                    </div>
                    <p class="text-sm text-gray-500">
                        {{ home.street }}, {{ home.city }}
                    </p>
                </app-card>
                <app-card>
                    <template #header>
                        <p class="mb-4">Make an offer</p>
                    </template>
                </app-card>
            </div>
        </div>
        <Link
            :href="route('listing.index')"
            class="inline-block mt-8 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-sm text-gray-100 duration-300"
            >Go Back</Link
        >
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppCard from "@/Components/UI/AppCard.vue";
import AppPrice from "@/Components/UI/AppPrice.vue";

defineProps({
    home: {
        type: Object,
        required: true,
    },
});
</script>
