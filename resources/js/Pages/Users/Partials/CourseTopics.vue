<template>
    <div class="flex justify-center text-white">
        <Link :href="'/topics/' + courses.name.toLowerCase().replace(' ', '_')" v-for="courses in course_topics" :key="courses.id">{{ courses.name }}</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    course_topics: Array,
});
</script>