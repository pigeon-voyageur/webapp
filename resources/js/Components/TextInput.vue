<script setup lang="ts">
import {onMounted, ref} from 'vue';

defineProps<{
    modelValue: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: string]
}>();

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

function handleInput(e: Event) {
    emit('update:modelValue', (e.target as HTMLInputElement).value)
}

defineExpose({focus: () => input.value?.focus()});
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="handleInput"
        ref="input"
    />
</template>
