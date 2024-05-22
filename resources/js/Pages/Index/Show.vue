<template>
    <div>Show</div>
    <div>The new message is {{ message }}</div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({ message: String });
</script>
