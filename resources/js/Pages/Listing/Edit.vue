<template>
    <form @submit.prevent="update">
        <div>
            <div>
                <label>Beds</label>
                <span v-if="newHome.errors.beds" class="error">
                    {{ newHome.errors.beds }}
                </span>
                <input v-model.number="newHome.beds" type="text" />
            </div>

            <div>
                <label>Baths</label>
                <span v-if="newHome.errors.baths" class="error">
                    {{ newHome.errors.baths }}
                </span>
                <input v-model.number="newHome.baths" type="text" />
            </div>

            <div>
                <label>Area</label>
                <span v-if="newHome.errors.area" class="error">
                    {{ newHome.errors.area }}
                </span>
                <input v-model.number="newHome.area" type="text" />
            </div>

            <div>
                <label>City</label>
                <span v-if="newHome.errors.city" class="error">
                    {{ newHome.errors.city }}
                </span>
                <input v-model="newHome.city" type="text" />
            </div>

            <div>
                <label>Post Code</label>
                <span v-if="newHome.errors.code" class="error">
                    {{ newHome.errors.code }}
                </span>
                <input v-model="newHome.code" type="text" />
            </div>

            <div>
                <label>Street</label>
                <span v-if="newHome.errors.street" class="error">
                    {{ newHome.errors.street }}
                </span>
                <input v-model="newHome.street" type="text" />
            </div>

            <div>
                <label>Street Nr</label>
                <span v-if="newHome.errors.street_nr" class="error">
                    {{ newHome.errors.street_nr }}
                </span>
                <input v-model.number="newHome.street_nr" type="text" />
            </div>

            <div>
                <label>Price</label>
                <span v-if="newHome.errors.price" class="error">
                    {{ newHome.errors.price }}
                </span>
                <input v-model.number="newHome.price" type="text" />
            </div>

            <div>
                <button type="submit">Update</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    home: Object,
});

const newHome = useForm({
    beds: props.home.beds,
    baths: props.home.baths,
    area: props.home.area,
    city: props.home.city,
    code: props.home.code,
    street: props.home.street,
    street_nr: props.home.street_nr,
    price: props.home.price,
});

const update = () => {
    newHome.put(route("listing.update", { listing: props.home.id }));
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
