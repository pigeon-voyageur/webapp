<script setup lang="ts">
defineProps<{
    value?: string;
}>();
</script>

<template>
    <label class="block text-body">
        <template v-if="value">{{ value }}</template>
        <template v-else>
            <slot />
        </template>
    </label>
</template>
