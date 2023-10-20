<template>
    <button
        class="relative z-0 w-full inline-flex items-center justify-center px-4 py-3 bg-black text-white"
    >
        <img class="absolute -z-10 top-0 left-0 h-full w-full object-cover" src="/assets/images/btn-bg.png" alt="" />
        <span class="absolute -z-10 top-0 left-0 h-full w-full border border-black scale-[1.02] -rotate-3"></span>
        <slot />
    </button>
</template>
