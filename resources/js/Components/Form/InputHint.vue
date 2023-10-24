<script setup lang="ts">
defineProps<{
    value?: string;
}>();
</script>

<template>
    <p class="text-meta my-1.5">
        <template v-if="value">{{ value }}</template>
        <template v-else>
            <slot />
        </template>
    </p>
</template>
