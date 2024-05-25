<template>
    <div>Show</div>
    <div>The new message is {{ message }}</div>
    <Price :price="listing.price" class="text-2xl font-bold" />
    <ListingSpace :listing="listing" class="text-lg" />
    <ListingAddress :listing="listing" class="text-gray-500" />
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({ message: String });
</script>
