<template>
    <header class="border-b p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <div
                class="w-12 h-8 border border-indigo-400 dark:border-indigo-600"
            >
                <p
                    class="font-semibold text-2xl text-indigo-400 dark:text-indigo-600"
                >
                    LaraZillow
                </p>
            </div>
            <nav
                class="flex flex-col md:flex-row gap-5 fixed md:static top-0 left-full w-full md:w-auto h-full p-8 md:p-4 bg-white dark:bg-gray-900 duration-500"
                :class="{ 'is-active': isNavigationActive }"
            >
                <Link
                    v-for="navEl in navigationElements"
                    :href="navEl.link"
                    @key="navEl.id"
                    @click="toggleNavForMobile"
                    class="font-medium hover:text-indigo-400 dark:hover:text-indigo-600"
                    >{{ navEl.text }}</Link
                >
                <Link
                    v-if="user"
                    :href="route('listing.create')"
                    @click="toggleNavForMobile"
                    class="font-medium hover:text-indigo-400 dark:hover:text-indigo-600"
                    >Sell home</Link
                >
                <Link v-if="user" :href="route('realtor.listing.index')">{{
                    user.name
                }}</Link>
                <div v-if="user">
                    <Link
                        :href="route('logout')"
                        method="delete"
                        as="button"
                        class="font-medium hover:text-indigo-400 dark:hover:text-indigo-600"
                        >Logout</Link
                    >
                </div>
                <Link
                    v-else
                    :href="route('login')"
                    @click="toggleNavForMobile"
                    class="font-medium hover:text-indigo-400 dark:hover:text-indigo-600"
                    >Sign-in</Link
                >
            </nav>
            <button
                @click="toggleNavForMobile"
                class="relative w-6 h-4 md:hidden before:content before:absolute before:left-0 before:top-0 before:w-full before:bg-gray-700 dark:before:bg-gray-300 before:h-px after:content after:absolute after:top-full after:left-0 after:w-1/2 after:bg-gray-700 dark:after:bg-gray-300 after:h-px"
            >
                <span
                    class="absolute top-2/4 block w-full h-px bg-gray-700 dark:bg-gray-300"
                ></span>
            </button>
        </div>
    </header>
    <main class="container mx-auto px-5 md:px-0">
        <div
            v-if="isVisible"
            class="bg-green-100 border border-green-500 px-4 py-2 rounded-md"
        >
            {{ successMessage }}
        </div>
        <slot />
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref, onUpdated, reactive } from "vue";

const TIME_TO_HIDE_MESSAGE = 3000;

const page = usePage();
const isVisible = ref(false);
const isNavigationActive = ref(false);
const navigationElements = reactive([
    {
        text: "Home",
        link: "/",
        id: 1,
    },
    {
        text: "About",
        link: "/hello",
        id: 2,
    },
    {
        text: "Show all Homes!",
        link: route("listing.index"),
        id: 3,
    },
]);

const successMessage = computed(() => page.props.flash.success);
const user = computed(() => page.props.user);

onUpdated(() => {
    isVisible.value = !isVisible.value ? !!page.props.flash.success : false;

    if (isVisible.value) {
        setTimeout(hideSuccessMessage, TIME_TO_HIDE_MESSAGE);
    }
});

const hideSuccessMessage = () => {
    isVisible.value = false;
};

const toggleNavForMobile = () => {
    isNavigationActive.value = !isNavigationActive.value;
};
</script>

<style>
nav.is-active {
    left: 0;
}
</style>
