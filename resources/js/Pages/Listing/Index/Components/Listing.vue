<template>
    <Box>
        <div>
            <Link :href="route('profile.show', { id: listing.owner.id })">
                <div class="flex items-center gap-1">
                    <span class="text-orange-500">
                        {{ listing.owner.name }}
                    </span>
                </div>
            </Link>
            <Link :href="route('listing.show', { listing: listing.id })">
                <Box>
                    wants a
                    <span class="text-orange-500">{{ listing.tradeWhat }}</span>
                    for a
                    <span class="text-orange-500">{{ listing.forWhat }}</span>
                </Box>
            </Link>
        </div>
    </Box>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Box from "@/Components/UI/Box.vue";

const props = defineProps({
    listing: Object,
});
</script>
