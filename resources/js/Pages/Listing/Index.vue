<template>
    <div class="mb-12">
        <h1
            class="mt-8 mb-8 text-2xl font-bold text-gray-500 dark:text-gray-400"
        >
            All homes for sale:
        </h1>
        <ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <li v-for="home in homes.data" @key="home.id">
                <app-card>
                    <app-home-info :home="home"></app-home-info>
                    <div class="flex gap-4 mt-4">
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
        <div v-if="isPaginationRequired">
            <app-pagination :links="homes.links"></app-pagination>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import AppHomeInfo from "@/Components/AppHomeInfo.vue";
import AppCard from "@/Components/UI/AppCard.vue";
import AppPagination from "@/Components/UI/AppPagination.vue";

const props = defineProps({
    homes: {
        type: Object,
        required: true,
        default: { data: [], links: [] },
    },
});

const isPaginationRequired = computed(() => props.homes.links.length > 1);
</script>
