<template>
    <div class="flex flex-col">
        <div>
            <h1 class="text-2xl font-bold mb-4">
                Lister: {{ listing.owner.name }}
            </h1>
            <Box>
                <h2 class="text-xl font-semibold">Trade What:</h2>
                <p class="text-lg">{{ listing.tradeWhat }}</p>
            </Box>
            <Box class="mt-4">
                <h2 class="text-xl font-semibold">For What:</h2>
                <p class="text-lg">{{ listing.forWhat }}</p>
            </Box>
            <div class="mt-4" v-if="listing.pictureUrl">
                <h2 class="text-xl font-semibold">Picture:</h2>
                <img
                    :src="listing.pictureUrl"
                    alt="Listing Picture"
                    class="w-full max-w-md mt-2"
                />
            </div>
            <div class="mt-4">
                <Link :href="route('listing.index')" class="btn-primary">
                    Back to Listings
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import { Link, usePage } from "@inertiajs/vue3";

const { listing } = usePage().props;
</script>
