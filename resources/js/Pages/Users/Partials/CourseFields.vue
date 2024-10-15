<template>
    <div class="flex justify-center">
        <ul class="flex gap-12">
            <li>
                <Link href="/browse/all" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500" :class="{ 'is-active': isActive('/browse/all') }">
                    All Topics
                </Link>
            </li>
            <li class="flex gap-10">
                <Link v-for="course in course_fields" :key="course.id" :href="'/browse/' + course.title.toLowerCase()" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500" :class="{ 'is-active': isActive('/browse/' + course.title.toLowerCase()) }">
                    {{ course.title }}
                </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    course_fields: Array,
});

const { url } = usePage();

const isActive = (route) => {
    return url === route;
};
</script>

<style>
.is-active {
    padding-bottom: 1.25rem;
    border-bottom-width: 4px;
    border-bottom-color: rgb(59 130 246);
    border-bottom-style: solid;
    color: white;
}
</style>
