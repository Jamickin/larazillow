<template>
    <div>
        <h1>User Profile</h1>
        <p>Name: {{ user.name }}</p>
        <p>Email: {{ user.email }}</p>
        <h2>Listings:</h2>
        <br />
        <ul>
            <li v-for="listing in listings" :key="listing.id">
                <Box>
                    <div>
                        <span class="text-orange-500">{{
                            listing.tradeWhat
                        }}</span>
                        for a
                        <span class="text-orange-500">{{
                            listing.forWhat
                        }}</span>
                    </div>
                    <div>
                        <Link
                            :href="
                                route('listing.edit', { listing: listing.id })
                            "
                        >
                            Edit
                        </Link>
                    </div>

                    <Link
                        :href="
                            route('listing.destroy', { listing: listing.id })
                        "
                        as="button"
                        method="DELETE"
                        class="text-red-500"
                    >
                        Delete
                    </Link>
                </Box>
            </li>
        </ul>
    </div>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    listings: Array,
    user: Object,
});
</script>
