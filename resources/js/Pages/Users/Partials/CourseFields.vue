<template>
    <div class="text-white flex">
        <li>All Topics</li>
        <li v-for="course in course_fields" :key="course.id">{{ course.name }}</li>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    course_fields: {
        type: Array,
    },
});
</script>
