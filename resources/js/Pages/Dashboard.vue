<template>
    <Head title="Dashboard" />
    <Navbar />
    <HomepageDetail />
    <CourseFields :course_fields="course_fields" />
    <CourseTopics :course_topics="course_topics"/>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

import Navbar from '@/Pages/Users/Navbar/Navbar.vue';
import HomepageDetail from '@/Pages/Users/Partials/HomepageDetail.vue';
import CourseFields from '@/Pages/Users/Partials/CourseFields.vue';
import CourseTopics from '@/Pages/Users/Partials/CourseTopics.vue';

const props = defineProps({
    course_fields: Array,
    course_topics: Array,
});
</script>