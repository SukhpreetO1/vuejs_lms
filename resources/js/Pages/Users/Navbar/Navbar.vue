<template>
    <div class="navbar flex justify-between h-24">
        <nav class="fixed w-full z-20 top-0 start-0 border-b border-slate-800">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <Link href="/browse/all" class="flex items-center space-x-3 rtl:space-x-reverse pl-8">
                    <ApplicationLogo class="h-12 fill-current bg-white rounded" />
                </Link>

                <div v-if="is_loggedin" class="p-4 flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-3 pr-8">
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="/images/letter-s.png" alt="user photo">
                        </button>
                        <div class="z-50 hidden my-7 text-base list-none bg-slate-800 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 w-56" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-white">{{ props.auth.user.name }}</span>
                                <span class="block text-sm  text-white">{{ props.auth.user.email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <DropdownLink :href="route('profile.edit')" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-slate-800 hover:text-slate-800">Profile</DropdownLink>
                                </li>
                                <li>
                                    <DropdownLink :href="route('logout')" method="post" as="button" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-slate-800 hover:text-slate-800">Sign out</DropdownLink>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div v-else class="p-4 flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-3 pr-8">
                    <Link href="/login" class="text-sky-200 bg-slate-700 hover:bg-gray-600 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 login_page">
                        Sign In
                    </Link>
                    <Link href="/register" class="text-white bg-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 signup_page hidden md:flex md:w-auto md:order-1">
                        Get Started for free
                    </Link>
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" :class="{ 'ml-48': !is_loggedin }" id="navbar-sticky">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent bg-slate-800">
                        <li>
                            <Link href="/browse/all" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500 is-active" aria-current="page">
                                Topics
                            </Link>
                        </li>
                        <li>
                            <a href="#" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500">
                                Series
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500">
                                Path
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
const is_loggedin = props.auth.user !== null;
</script>

<style>
.is-active {
    padding-bottom: 1.25rem;
    border-bottom-width: 4px;
    border-bottom-color: rgb(59 130 246 / var(--tw-border-opacity));
    border-bottom-style: solid;
    color: white;
}
</style>