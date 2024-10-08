<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import CrossLogo from '@/Components/CrossLogo.vue';

import { ref } from 'vue';
import Modal from "../../Components/Modal.vue";
import Register from "@/Pages/Auth/Register.vue";
import ForgotPassword from '@/Pages/Auth/ForgotPassword.vue';

const showRegisterModal = ref(false);
const showForgotPasswordModal = ref(false);

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const emit = defineEmits(['close']);

const openRegisterModal = () => {
    showRegisterModal.value = true;
};

const openForgotPasswordModal = () => {
    showForgotPasswordModal.value = true;
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <header class="py-14 text-center md:px-16 text-white">
                <div class="text-4xl font-bold">Log In</div>
            </header>
            <div class="absolute text-white top-6 right-6">
                <CrossLogo class="h-10 bg-slate-500 px-3 py-3 rounded-lg cursor-pointer" @click="$emit('close', true)"/>
            </div>
            <div>
                <InputLabel for="email" value="Email" class="text-sky-200"/>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" class="text-sky-200"/>

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="my-4 w-full mt-8">
                <button class="text-white bg-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400 focus:outline-none font-medium rounded-lg text-base px-4 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 signup_page flex md:flex md:w-full md:order-1 items-center justify-center" :disabled="form.processing">
                    Log in
                </button>
            </div>

            <div class="flex justify-between">
                <div>
                    <!-- <Link :href="route('password.request')" class="text-sky-200 hover:underline rounded-md focus:outline-none" > -->
                    <button @click.prevent="openForgotPasswordModal" class="text-sky-200 hover:underline rounded-md focus:outline-none" >
                        Forgot your password?
                    </button>
                    <Modal v-if="showForgotPasswordModal" :show="showForgotPasswordModal" @close="showForgotPasswordModal = false" max-width="2xl">
                        <ForgotPassword @close="showForgotPasswordModal = false" />
                    </Modal>
                </div>
                <div>
                    <!-- <Link :href="route('register')" class="text-sky-200 hover:underline rounded-md focus:outline-none" > -->
                    <button @click.prevent="openRegisterModal" class="text-sky-200 hover:underline rounded-md focus:outline-none">
                        Sign Up!
                    </button>
                    <!-- </Link> -->
                    <Modal v-if="showRegisterModal" :show="showRegisterModal" @close="showRegisterModal = false" max-width="2xl">
                        <Register @close="showRegisterModal = false"/>
                    </Modal>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>