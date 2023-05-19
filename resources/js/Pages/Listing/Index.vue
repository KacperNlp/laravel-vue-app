<template>
    <div>
        <h1>All homes for sale:</h1>
        <ul>
            <li v-for="home in homes" @key="home.id">
                <app-home-address :home="home"></app-home-address>
                <div class="actions">
                    <Link :href="route('listing.show', home.id)">Details</Link>
                    <Link :href="route('listing.edit', home.id)">Edit</Link>
                    <Link
                        :href="route('listing.destroy', home.id)"
                        method="delete"
                        as="button"
                        >Delete</Link
                    >
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppHomeAddress from "@/Components/AppHomeAddress.vue";

defineProps({
    homes: {
        type: Array,
        required: true,
        default: [],
    },
});
</script>

<style scoped>
.actions {
    display: flex;
    gap: 20px;
}
</style>
