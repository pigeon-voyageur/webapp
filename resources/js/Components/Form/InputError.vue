<script setup lang="ts">
defineProps<{
    message?: string;
}>();
</script>

<template>
    <div v-show="message" class="mt-2">
        <p class="text-meta text-red">
            {{ message }}
        </p>
    </div>
</template>
