<template>
    <div>
        <h1
            class="mt-8 mb-8 text-2xl font-bold text-gray-500 dark:text-gray-400"
        >
            All homes for sale:
        </h1>
        <ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <li v-for="home in homes" @key="home.id">
                <app-card>
                    <app-home-info :home="home"></app-home-info>
                    <div class="actions">
                        <Link :href="route('listing.show', home.id)"
                            >Details</Link
                        >
                        <Link :href="route('listing.edit', home.id)">Edit</Link>
                        <Link
                            :href="route('listing.destroy', home.id)"
                            method="delete"
                            as="button"
                            >Delete</Link
                        >
                    </div>
                </app-card>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppHomeInfo from "@/Components/AppHomeInfo.vue";
import AppCard from "@/Components/UI/AppCard.vue";

defineProps({
    homes: {
        type: Array,
        required: true,
        default: [],
    },
});
</script>
