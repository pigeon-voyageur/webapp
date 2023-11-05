<script setup lang="ts">

import {useClipboard} from "@vueuse/core";

const props = defineProps<{
    value: string;
}>();

const {copy, copied, isSupported} = useClipboard()
</script>

<template>
    <div
        class="relative input-field flex items-center "
    >
        <span class="text-meta -m-2 p-2 whitespace-nowrap select-all overflow-auto">
        {{ value }}
        </span>
        <button v-if="isSupported" class="absolute top-0 right-0 h-full px-4 bg-white" @click="copy(value)">
            {{ copied ? 'Copié' : 'Copier' }}
        </button>
    </div>
</template>
