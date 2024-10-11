<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import CrossLogo from '@/Components/CrossLogo.vue';
import { ref } from 'vue';
import Modal from "../../Components/Modal.vue";

const showModal = ref(true);

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};

const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <Modal v-if="showModal" :show="showModal" @close="closeModal" max-width="2xl">
        <GuestLayout>
            <Head title="Forgot Password" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <header class="py-14 text-center md:px-16 text-white">
                    <div class="text-4xl font-bold">Forgot Password</div>
                </header>

                <div class="absolute text-white top-6 right-6">
                    <CrossLogo url="/browse/all" class="h-10 bg-slate-500 px-3 py-3 rounded-lg cursor-pointer" />
                </div>

                <div class="mb-4 text-sm text-sky-200">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </div>

                <div>
                    <InputLabel for="email" value="Email" class="text-sky-200" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <Link :href="route('login')" class="text-sky-200 hover:underline rounded-md focus:outline-none">
                        Already registered?
                    </Link>

                    <button class="text-white bg-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400 focus:outline-none font-medium rounded-lg text-base px-4 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 signup_page flex md:flex md:order-1 items-center justify-center" :disabled="form.processing">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </GuestLayout>
    </Modal>
</template>
