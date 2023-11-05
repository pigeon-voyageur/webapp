<script setup lang="ts">
import TheNavigation from "@/Components/TheNavigation.vue";</script>

<template>
    <div class="max-w-mobile mx-auto relative min-h-screen z-0 flex flex-col bg-white">
        <header v-if="$slots.header" class="container">
            <slot name="header" />
        </header>

        <main class="flex-grow pb-20">
            <slot />
        </main>

        <TheNavigation class="fixed bottom-0" />
    </div>
</template>
