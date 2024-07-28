<template>
    <div class="flex gap-1">
        <Link
            v-for="(link, index) in links"
            :key="index"
            class="py-2 px-4 rounded-md"
            :href="link.url"
            :class="
                link.active
                    ? 'bg-orange-500 dark:bg-orange-800 text-gray-300'
                    : ''
            "
            v-html="link.label"
        >
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({ links: Array });
</script>
