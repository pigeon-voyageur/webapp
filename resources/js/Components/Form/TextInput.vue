<script setup lang="ts">
import {computed, onMounted, ref} from 'vue';

const props = defineProps<{
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

defineExpose({focus: () => input.value?.focus()});


function handleInput(e: Event) {
    emit('update:modelValue', (e.target as HTMLInputElement).value)
}

const value = computed({
    get() {
        return props.modelValue
    },
    set(value) {
        emit('update:modelValue', value)
    }
})
</script>

<template>
    <input
        class="input-field"
        v-model="value"
        ref="input"
    />
</template>
