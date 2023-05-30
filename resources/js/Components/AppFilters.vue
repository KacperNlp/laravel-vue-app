<template>
    <div>
        <form @submit.prevent="submitFilter" class="flex flex-wrap gap-3">
            <div class="filter-grid">
                <input
                    v-model="filter.priceFrom"
                    type="number"
                    name="priceFrom"
                    placeholder="Price from"
                    min="1"
                    class="filter-input-left"
                />
                <input
                    v-model="filter.priceTo"
                    type="number"
                    name="priceTo"
                    placeholder="Price to"
                    min="2"
                    class="filter-input-right"
                />
            </div>
            <div class="filter-grid">
                <select
                    v-model="filter.beds"
                    name="beds"
                    class="filter-input-left"
                >
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="+6">+6</option>
                </select>
                <select
                    v-model="filter.baths"
                    name="baths"
                    class="filter-input-right"
                >
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="+6">+6</option>
                </select>
            </div>
            <div class="filter-grid">
                <input
                    v-model="filter.areaFrom"
                    type="number"
                    name="areaFrom"
                    placeholder="Area from"
                    min="1"
                    class="filter-input-left"
                />
                <input
                    v-model="filter.areaTo"
                    type="number"
                    name="areaTo"
                    placeholder="Area to"
                    min="2"
                    class="filter-input-right"
                />
            </div>
            <div class="filter-grid">
                <button
                    type="submit"
                    class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-gray-50 duration-200"
                >
                    Filter
                </button>
                <button @click="clear" type="reset" class="ml-2">Clear</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    filters: Object,
});

const filter = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null,
});

const submitFilter = () => {
    filter.get(route("listing.index"), {
        preserveState: true,
        preserveScroll: true,
    });
};

const clear = () => {
    filter.priceFrom = null;
    filter.priceTo = null;
    filter.beds = null;
    filter.baths = null;
    filter.areaFrom = null;
    filter.areaTo = null;

    submitFilter();
};
</script>
