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
                    <div v-if="canEditOrDelete">
                        <Link
                            :href="
                                route('listing.edit', { listing: listing.id })
                            "
                        >
                            Edit
                        </Link>
                    </div>
                    <div v-if="canEditOrDelete">
                        <Link
                            :href="
                                route('listing.destroy', {
                                    listing: listing.id,
                                })
                            "
                            as="button"
                            method="DELETE"
                            class="text-red-500"
                        >
                            Delete
                        </Link>
                    </div>
                </Box>
            </li>
        </ul>
    </div>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({
    listings: Array,
    user: Object,
});

const page = usePage();
const currentUser = computed(() => page.props.currentUser);

const canEditOrDelete = computed(() => {
    // Ensure `user` is accessed from `props`
    return (
        currentUser.value &&
        (currentUser.value.id === props.user.id || currentUser.value.is_admin)
    );
});
</script>
