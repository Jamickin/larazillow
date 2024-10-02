<template>
    You need to be verified to view this page
    <div>
        <Link
            :href="route('verification.send')"
            method="post"
            as="button"
            class="text-indigo-600 dark:text-indigo-400"
            >Resend Email Verification</Link
        >
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
