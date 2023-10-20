<script setup lang="ts">
defineProps<{
    value?: string;
}>();
</script>

<template>
    <label class="block text-body">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
