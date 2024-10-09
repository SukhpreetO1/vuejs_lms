<script setup>
import { computed, onMounted, ref, useAttrs } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    inputType: {
        type: String,
        default: 'text',
    },
});

const emit = defineEmits(['update:modelValue']);

const input = ref(null);
const showPassword = ref(false);
const $attrs = useAttrs();

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

const hasPasswordClass = computed(() => {
    return $attrs.class && $attrs.class.includes('password');
});

const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value;
};

const updateValue = (event) => {
    emit('update:modelValue', event.target.value);
};

const inputType = computed(() => {
    return hasPasswordClass.value ? (showPassword.value ? 'text' : 'password') : props.inputType;
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input :type="inputType" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" :value="modelValue" @input="updateValue" ref="input" :id="$attrs.id" :required="$attrs.required" :autocomplete="$attrs.autocomplete" />
    <button v-if="hasPasswordClass" type="button" @click="togglePasswordVisibility" class="absolute pr-3 right-0 top-8" aria-label="Toggle password visibility">
        <svg v-if="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5C6.5 4.5 3 12 3 12s3.5 7.5 9 7.5 9-7.5 9-7.5-3.5-7.5-9-7.5z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a3 3 0 100-6 3 3 0 000 6z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
        </svg>

        <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12s2.5-5 9-5 9 5 9 5-2.5 5-9 5-9-5-9-5z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 10-6 0 3 3 0 006 0z" />
        </svg>
    </button>
</template>
