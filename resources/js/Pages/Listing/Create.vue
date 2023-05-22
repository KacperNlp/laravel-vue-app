<template>
    <form @submit.prevent="create">
        <div class="flex flex-col gap-4 max-w-xl mx-auto">
            <app-form-element
                :error="newHome.errors.beds"
                v-model="newHome.beds"
                labelText="Beds"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.baths"
                v-model="newHome.baths"
                labelText="Baths"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.area"
                v-model="newHome.area"
                labelText="Area"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.city"
                v-model="newHome.city"
                labelText="City"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.code"
                v-model="newHome.code"
                labelText="Post Code"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.street"
                v-model="newHome.street"
                labelText="Street"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.street_nr"
                v-model="newHome.street_nr"
                labelText="Street nr"
            ></app-form-element>

            <app-form-element
                :error="newHome.errors.price"
                v-model="newHome.price"
                labelText="Price"
            ></app-form-element>

            <div class="flex justify-center">
                <button type="submit" class="btn-primary">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import AppFormElement from "@/Components/UI/AppFormElement.vue";

const newHome = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: null,
    code: null,
    street: null,
    street_nr: null,
    price: 0,
});

const create = () => {
    newHome.post(route("listing.store"));
};
</script>

<style scoped>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}

.error {
    display: block;
    margin: 5px 0;
    color: rgb(172, 37, 37);
    font-size: 12px;
}
</style>
