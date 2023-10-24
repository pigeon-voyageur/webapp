<script setup lang="ts">
defineProps<{
    value?: string;
}>();
</script>

<template>
    <p class="text-meta mt-2">
        <template v-if="value">{{ value }}</template>
        <template v-else>
            <slot />
        </template>
    </p>
</template>
