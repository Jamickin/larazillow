<template>
    <div>
        <h1>User Profile</h1>
        <p>Name: {{ user.name }}</p>
        <p>Email: {{ user.email }}</p>
        <h2>Listings</h2>
        <ul>
            <li v-for="listing in listings" :key="listing.id">
                <Box>
                    <div>
                        {{ user.name }}
                        <span class="text-orange-500">{{
                            listing.tradeWhat
                        }}</span>
                        for a
                        <span class="text-orange-500">{{
                            listing.forWhat
                        }}</span>
                    </div>
                </Box>
            </li>
        </ul>
    </div>
</template>

<script>
import Box from "@/Components/UI/Box.vue";

export default {
    props: {
        user: Object,
        listings: Array,
    },
};
</script>
