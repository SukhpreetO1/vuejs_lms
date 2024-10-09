<template>
    <Link :href="url">
        <img src="/images/remove.png" alt="Logo" :class="class">
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    url: {
        type: String,
        required: true,
    },
    class: {
        type: String,
    }
});
</script>