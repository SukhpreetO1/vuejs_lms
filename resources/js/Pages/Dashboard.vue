<template>
    <Head title="Dashboard" />
    <Navbar />
    <HomepageDetail />
    <CourseFields :course_fields="course_fields" />
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

import Navbar from '@/Pages/Users/Navbar/Navbar.vue';
import HomepageDetail from '@/Pages/Users/Partials/HomepageDetail.vue';
import CourseFields from '@/Pages/Users/Partials/CourseFields.vue';

const props = defineProps({
    course_fields: Array,
});
</script>