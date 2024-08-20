<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section class="mb-8">
        <RealtorFilters :filters="filters"></RealtorFilters>
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id">
            <div
                class="flex flex-col md:flex-row gap-2 md:items-center justify-between"
            >
                <div :class="{ 'opacity-25': listing.deleted_at }">
                    <div class="xl:flex items-center gap-2">
                        <Price
                            :price="listing.price"
                            class="text-2xl font-medium"
                        />
                        <ListingSpace :listing="listing" />
                    </div>

                    <ListingAddress :listing="listing" />
                </div>
                <div
                    v-if="!listing.deleted_at"
                    class="flex items-center gap-1 text-gray-600 dark:text-gray-300"
                >
                    <a
                        class="btn-outline text-xs font-medium"
                        :href="route('listing.show', { listing: listing.id })"
                        target="_blank"
                        >Preview</a
                    >
                    <Link
                        class="btn-outline text-xs font-medium"
                        :href="
                            route('realtor.listing.edit', {
                                listing: listing.id,
                            })
                        "
                        >Edit</Link
                    >
                    <Link
                        class="btn-outline text-xs font-medium"
                        :href="
                            route('realtor.listing.destroy', {
                                listing: listing.id,
                            })
                        "
                        as="button"
                        method="delete"
                    >
                        Delete
                    </Link>
                    <Link
                        :href="
                            route('realtor.listing.image.create', {
                                listing: listing.id,
                            })
                        "
                        class="block w-full btn-outline text-xs font-medium text-center"
                    >
                        Images ({{ listing.images_count }})
                    </Link>

                    <Link
                        :href="
                            route('realtor.listing.show', {
                                listing: listing.id,
                            })
                        "
                        class="block w-full btn-outline text-xs font-medium text-center"
                    >
                        Offers ({{ listing.offers_count }})
                    </Link>
                </div>
                <div v-else>
                    <Link
                        class="btn-outline text-xs font-medium"
                        :href="
                            route('realtor.listing.restore', {
                                listing: listing.id,
                            })
                        "
                        as="button"
                        method="put"
                    >
                        Restore
                    </Link>
                </div>
            </div>
        </Box>
    </section>
    <section
        v-if="listings.data.length > 0"
        class="w-full my-4 flex justify-center"
    >
        <Pagination :links="listings.links"></Pagination>
    </section>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
// import EmptyState from "@/Components/UI/EmptyState.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import RealtorFilters from "@/Pages/Realtor/Index/Components/RealtorFilters.vue";
import { Link } from "@inertiajs/vue3";
// import EmptyState from "@/Components/UI/EmptyState.vue";
// import Pagination from "@/Components/UI/Pagination.vue";
// import RealtorFilters from "@/Pages/Realtor/Index/Components/RealtorFilters.vue";

defineProps({
    listings: Object,
    filters: Object,
});
</script>
