<template>
    <div>
        <p>City: {{ home.city }}</p>
        <p>Beds: {{ home.beds }}</p>
        <p>Baths: {{ home.baths }}</p>
        <p>Area: {{ home.area }} m2</p>
        <p>Price: ${{ home.price }}</p>
    </div>
</template>

<script setup>
defineProps({
    home: {
        type: Object,
        required: true,
    },
});
</script>
