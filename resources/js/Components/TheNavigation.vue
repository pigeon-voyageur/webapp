<script setup lang="ts">
import {Link} from '@inertiajs/vue3';
import {HomeIcon, PencilIcon, UserGroupIcon, UserIcon} from '@heroicons/vue/24/outline';</script>
<template>
    <nav class="max-w-mobile w-full h-20 bg-white border-t flex p-4 items-center justify-evenly">
        <Link :href="route('news.index')" class="aspect-square p-1 h-full">
            <span class="sr-only">Accueil</span>
            <HomeIcon class="text-black h-full mx-auto" />
        </Link>
        <Link :href="route('news.create')" class="aspect-square p-1 h-full">
            <span class="sr-only">Publier une information</span>
            <PencilIcon class="text-black h-full mx-auto" />
        </Link>
        <Link :href="route('town.show')" class="aspect-square p-1 h-full">
            <span class="sr-only">Mon village</span>
            <UserGroupIcon class="text-black h-full mx-auto" />
        </Link>
        <Link :href="route('profile.show')" class="aspect-square p-1 h-full">
            <span class="sr-only">Profil</span>
            <UserIcon class="text-black h-full mx-auto" />
        </Link>
    </nav>
</template>
