<script setup lang="ts">
import {Link} from '@inertiajs/vue3';
import {HomeIcon, PencilIcon, UserIcon} from '@heroicons/vue/24/outline';</script>

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
                <span class="sr-only">Accueil</span>
                <HomeIcon class="text-black h-full mx-auto" />
            </Link>
            <Link :href="route('news.create')" class="aspect-square p-1 h-full">
                <span class="sr-only">Publier une information</span>
                <PencilIcon class="text-black h-full mx-auto" />
            </Link>
            <Link :href="route('profile.edit')" class="aspect-square p-1 h-full">
                <span class="sr-only">Profil</span>
                <UserIcon class="text-black h-full mx-auto" />
            </Link>
        </nav>
    </div>
</template>
