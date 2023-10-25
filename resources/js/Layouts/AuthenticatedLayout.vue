<script setup lang="ts">
import {Link} from '@inertiajs/vue3';</script>

<template>
    <div class="relative min-h-screen z-0 flex flex-col bg-white">
        <header v-if="$slots.header" class="container">
            <slot name="header" />
        </header>

        <main class="flex-grow pb-20">
            <slot />
        </main>

        <nav class="fixed bottom-0 w-full h-20 bg-white border-t flex p-4 items-center justify-evenly">
            <Link :href="route('news.index')" class="aspect-square p-1 h-full">
                <img src="/assets/icons/home.svg" class="h-full mx-auto" alt="Accueil" />
            </Link>
            <Link :href="route('news.create')" class="aspect-square p-1 h-full">
                <img src="/assets/icons/publish.svg" class="h-full mx-auto" alt="Publier" />
            </Link>
            <Link :href="route('profile.edit')" class="aspect-square p-1 h-full">
                <img src="/assets/icons/profile.svg" class="h-full mx-auto" alt="Profil" />
            </Link>
        </nav>
    </div>
</template>
