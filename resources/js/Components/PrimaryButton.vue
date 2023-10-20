<script setup lang="ts">
withDefaults(defineProps<{
    disabled: boolean
}>(), {
    disabled: false
});

</script>
<template>
    <button
        :disabled="disabled"
        ref="btn"
        class="relative z-0 w-full inline-flex items-center justify-center px-4 py-3 bg-black text-white"
        :class="{'opacity-50': disabled}"
    >
        <img class="absolute -z-10 top-0 left-0 h-full w-full object-cover" src="/assets/images/btn-bg.png" alt="" />
        <span class="absolute -z-10 top-0 left-0 h-full w-full border border-black scale-[1.02] -rotate-3"></span>
        <slot />
    </button>
</template>
