<script setup lang="ts">
import {computed, onMounted, ref} from 'vue';

const props = defineProps<{
    modelValue: number;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: number]
}>();

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

defineExpose({focus: () => input.value?.focus()});

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
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model.number="value"
        ref="input"
    />
</template>
