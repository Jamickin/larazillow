<template>
    <Box>
        <div>
            <!-- Link to the owner's profile page -->
            <Link :href="route('profile.show', { id: listing.owner.id })">
                <div class="flex items-center gap-1">
                    <span class="text-orange-500">
                        {{ listing.owner.name }}
                    </span>
                </div>
            </Link>

            <!-- Link to the listing's detail page -->
            <Link :href="route('listing.show', { listing: listing.id })">
                wants a
                <span class="text-orange-500">{{ listing.tradeWhat }}</span>
                for a
                <span class="text-orange-500">{{ listing.forWhat }}</span>
            </Link>
        </div>

        <div v-if="user"></div>
    </Box>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Box from "@/Components/UI/Box.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    listing: Object,
});

const page = usePage();
const user = computed(() => page.props.user);
</script>
