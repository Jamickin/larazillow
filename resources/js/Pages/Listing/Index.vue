<template>
    <div v-for="listing in props.listings" :key="listing.id">
        <div>
            <Link :href="route('listing.show', { listing: listing.id })">
                <ListingAddress :listing="listing"></ListingAddress>
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', { listing: listing.id })"
                >Edit</Link
            >
        </div>
        <Link
            :href="route('listing.destroy', { listing: listing.id })"
            method="DELETE"
            as="button"
            >Delete
        </Link>
    </div>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
const props = defineProps({
    listings: Array,
});
onMounted(() => {});
</script>
