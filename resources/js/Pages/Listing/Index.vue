<template>
    <Filters :filters="filters" />
    <div
        v-if="listings.data.length"
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4"
    >
        <Listing
            v-for="listing in listings.data"
            :key="listing.id"
            :listing="listing"
        />
    </div>
    <div class="text-center h-96 flex justify-center place-items-center" v-else>
        Nothing matches that description
    </div>
    <div
        v-if="listings.data.length"
        class="w-full flex justify-center mt-4 mb-4"
    >
        <Pagination :links="listings.links"></Pagination>
    </div>
</template>

<script setup>
import Listing from "./Index/Components/Listing.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Filters from "@/Pages/Listing/Index/Components/Filters.vue";

const props = defineProps({
    listings: Object,
    filters: Object,
});
</script>
