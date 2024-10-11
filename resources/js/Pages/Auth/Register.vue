<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import CrossLogo from '@/Components/CrossLogo.vue';
import { ref } from 'vue';
import Modal from "../../Components/Modal.vue";

const showModal = ref(true);

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <Modal v-if="showModal" :show="showModal" @close="closeModal" max-width="2xl">
        <GuestLayout>
            <Head title="Register" />

            <form @submit.prevent="submit">
                <header class="py-14 text-center md:px-16 text-white">
                    <div class="text-4xl font-bold">Sign Up!</div>
                </header>

                <div class="absolute text-white top-6 right-6">
                    <CrossLogo url="/browse/all" class="h-10 bg-slate-500 px-3 py-3 rounded-lg cursor-pointer" />
                </div>

                <div>
                    <InputLabel for="name" value="Name" class="text-sky-200" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" class="text-sky-200" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4 relative">
                    <InputLabel for="password" value="Password" class="text-sky-200" />
                    <TextInput id="password" type="password" class="mt-1 block w-full password" v-model="form.password" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4 relative">
                    <InputLabel for="password_confirmation" value="Confirm Password" class="text-sky-200" />
                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full password" v-model="form.password_confirmation" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="my-4 w-full mt-8">
                    <button class="text-white bg-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400 focus:outline-none font-medium rounded-lg text-base px-4 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 signup_page flex md:flex w-full md:order-1 items-center justify-center" :disabled="form.processing">
                        Register
                    </button>
                </div>

                <div class="flex items-center justify-center">
                    <Link :href="route('login')" class="text-sky-200 hover:underline rounded-md focus:outline-none">
                        Already registered?
                    </Link>
                </div>
            </form>
        </GuestLayout>
    </Modal>
</template>
