<template>
    <div class="navbar flex justify-between h-24">
        <nav class="fixed w-full z-20 top-0 start-0 border-b border-slate-800">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <Link href="/browse/all" class="flex items-center space-x-3 rtl:space-x-reverse pl-8">
                    <ApplicationLogo class="h-12 fill-current bg-white rounded" />
                </Link>
                <div class="p-4 flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-3 pr-8">
                    <button type="button" class="text-sky-200 bg-slate-700 hover:bg-gray-600 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 login_page" @click="showLoginModal = true">Sign In</button>
                    <button type="button" class="text-white bg-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 signup_page hidden md:flex md:w-auto md:order-1" @click="showSignUpModal = true">Get Started for free</button>
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 ml-52" id="navbar-sticky">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                        <li>
                            <a href="#" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500 is-active" aria-current="page">Topics</a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500">Series</a> 
                        </li>
                        <li>
                            <a href="#" class="text-slate-400 font-black navbar-link group block flex-shrink-0 text-md uppercase text-card-200 hover:text-white xl:text-center py-5 hover:border-b-4 hover:border-b-blue-500">Path</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <Modal v-if="showLoginModal" :show="showLoginModal" @close="showLoginModal = false" max-width="2xl">
            <Login @close="showLoginModal = false" />
        </Modal>
        
        <Modal v-if="showSignUpModal" :show="showSignUpModal" @close="showSignUpModal = false" max-width="2xl" >
            <Register @close="showSignUpModal = false"/>
        </Modal>
    </div>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from "../../../../Components/Modal.vue"
import Login from "@/Pages/Auth/Login.vue";
import Register from '@/Pages/Auth/Register.vue';

const showLoginModal = ref(false);
const showSignUpModal = ref(false);
</script>

<style>
.is-active{
    padding-bottom: 1.25rem;
    border-bottom-width: 4px;
    border-bottom-color: rgb(59 130 246 / var(--tw-border-opacity));
    border-bottom-style: solid;
    color: white;
}
</style>