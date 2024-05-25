<template>
    <span>
        {{ listing.city }}, {{ listing.street }}, {{ listing.street_nr }}
    </span>
</template>

<script setup>
import { onMounted } from "vue";
const props = defineProps({
    listing: Object,
});

onMounted(() => {
    console.log("Listing:", props.listing);
});
</script>
