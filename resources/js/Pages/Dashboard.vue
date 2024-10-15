<template>
    <Head title="Dashboard" />
    <Navbar />
    <HomepageDetail />
    <CourseFields :course_fields="course_fields" />
    <CourseTopics :course_topics="course_topics"/>
    <Community />
    <Footer />
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

import Navbar from '@/Pages/Users/Navbar/Navbar.vue';
import HomepageDetail from '@/Pages/Users/Partials/HomepageDetail.vue';
import CourseFields from '@/Pages/Users/Partials/CourseFields.vue';
import CourseTopics from '@/Pages/Users/Partials/CourseTopics.vue';
import Community from '@/Pages/Users/Community/Community.vue';
import Footer from '@/Pages/Users/Footer/Footer.vue';

const props = defineProps({
    course_fields: Array,
    course_topics: Array,
});
</script>