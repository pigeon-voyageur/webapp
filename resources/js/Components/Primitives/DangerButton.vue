<script setup lang="ts">

withDefaults(defineProps<{
    disabled?: boolean
}>(), {
    disabled: false
});

</script>
<template>
    <button
        :disabled="disabled"
        ref="btn"
        class="relative z-0 w-full h-11 inline-flex items-center justify-center text-white bg-red"
        :class="{'opacity-50': disabled}"
    >
        <slot />
    </button>
</template>
