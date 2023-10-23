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
        class="relative z-0 w-full h-14 inline-flex items-center justify-center text-white"
        :class="{'opacity-50': disabled}"
    >
        <img class="absolute -z-10 top-1/2 -translate-y-1/2 left-0 h-11 w-full object-cover" src="/assets/images/btn-bg.png" alt="" />
        <span class="absolute -z-10 top-1/2 -translate-y-1/2 left-0 h-11 w-full border border-black scale-[1.01] -rotate-2"></span>
        <slot />
    </button>
</template>
