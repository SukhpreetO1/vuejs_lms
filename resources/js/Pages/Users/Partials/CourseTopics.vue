<template>
    <div class="flex text-sky-100">
        <div class="hide-scrollbar mx-auto mb-3 mt-8 justify-start gap-x-4 gap-y-5">
            <div class="topic-card flex justify-start text-center gap-4 mt-6 mx-auto gap-x-4 gap-y-5" v-for="(row, rowIndex) in arrangedCourses" :key="rowIndex">
                <Link class="panel relative hoverable flex h-20 w-56 flex-shrink-0 cursor-pointer flex-col rounded-2xl px-3 py-1 bg-slate-800 border-2 border-slate-800" v-for="courses in row" :key="courses.id" :href="'/topics/' + courses.name.toLowerCase().replace(' ', '_')">
                    <div class="flex flex-1 items-center justify-center">
                        <div class="mr-4 flex flex-shrink-0 justify-center">
                            <img width="50" height="50" :src="getImagePath(courses.course_image)" alt="alpine-logo.svg topic icon" class="h-full" loading="lazy">
                        </div>
                        <div class="w-full lg:w-auto flex justify-between md:block text-center">
                            <h2 class="text-start text-base font-semibold leading-tight">{{ courses.name }}</h2>
                            <div class="hidden text-left md:block text-xs md:text-3xs">9 Series
                                <span class="relative inline-block px-1 text-xs" style="top: 1px;"> • </span> 140 Videos
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    course_topics: Array,
});

const arrangedCourses = computed(() => {
  const total = props.course_topics.length;
  const itemsPerRow = total >= 15 ? 5 : (total < 10 ? 3 : 4);
  const rows = Math.ceil(total / itemsPerRow);

  return Array.from({ length: rows }, (_, rowIndex) => 
    props.course_topics.slice(rowIndex * itemsPerRow, (rowIndex + 1) * itemsPerRow)
  );
});

const getImagePath = (imageName) => {
    return imageName ? `/storage/${imageName}` : `/images/dummy_logo.png`;
};
</script>