<script setup lang="ts">
import {onMounted, ref} from 'vue';

defineProps<{
    modelValue: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: string]
}>();

const input = ref<HTMLTextAreaElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

function handleInput(e: Event) {
    emit('update:modelValue', (e.target as HTMLTextAreaElement).value)
}

defineExpose({focus: () => input.value?.focus()});
</script>

<template>
    <textarea
        class="input-field h-auto"
        :value="modelValue"
        @input="handleInput"
        ref="input"
    />
</template>
