<template>
    <Box>
        <div>
            <Link :href="route('listing.show', { listing: props.listing.id })">
                <div class="flex items-center gap-1">
                    <!-- <Price :price="listing.price" class="text-2xl font-bold" /> -->
                    {{ user.name }} wants a {{ listing.tradeWhat }} for<br />
                    {{ listing.forWhat }}

                    <!-- <div class="text-xs text-gray-500">
                        <Price :price="monthlyPayment">pm</Price>
                    </div> -->
                </div>

                <!-- <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" /> -->
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', { listing: props.listing.id })">
                Edit
            </Link>
        </div>
        <div v-if="user">
            <Link
                :href="route('listing.destroy', { listing: props.listing.id })"
                as="button"
                method="DELETE"
                class="text-red-500"
            >
                Delete
            </Link>
        </div>
    </Box>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
// import ListingAddress from "@/Components/ListingAddress.vue";
import Box from "@/Components/UI/Box.vue";
// import ListingSpace from "@/Components/ListingSpace.vue";
// import Price from "@/Components/Price.vue";
// import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({
    listing: Object,
});

// const duration = 25;
// const interestRate = 2.5;

// const { monthlyPayment } = useMonthlyPayment(
//     props.listing.price,
//     interestRate,
//     duration
// );

const page = usePage();
const user = computed(() => page.props.user);
</script>
