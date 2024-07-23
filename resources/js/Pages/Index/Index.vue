<template>
    <div>Index</div>
    <div>The message is {{ message }}</div>
    <Link :href="route('listings.show')">Go to the main page</Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({ message: String });
</script>
