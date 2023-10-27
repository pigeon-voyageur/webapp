<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, usePage} from '@inertiajs/vue3';
import H1 from "@/Components/Primitives/H1.vue";
import H2 from "@/Components/Primitives/H2.vue";
import SecondaryButton from '@/Components/Primitives/SecondaryButton.vue';
import {ChevronLeftIcon} from '@heroicons/vue/24/outline';

import DeleteNewsForm from './Partials/DeleteNewsForm.vue';
import NewsData = App.Data.NewsData;

defineProps<{
    news: NewsData;
}>();

const user = usePage().props.auth.user;

</script>

<template>
    <Head>
        <title>Information</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <Link :href="route('news.index')" class="text-meta text-black no-underline flex gap-1.5 mt-5">
                <ChevronLeftIcon class="h-5" />
                Retour
            </Link>
        </template>

        <img src="/assets/images/auth-bg.png" alt="" class="absolute top-0 left-0 w-full -z-10" />

        <div class="container py-6">

            <H1 class="text-blue">{{ news.title }}</H1>
            <p class="text-meta my-2">{{ news.category.title }}</p>

            <H2 class="mt-7 mb-4"> En quelques mots...</H2>
            <p class="text-body">{{ news.summary }}</p>

            <H2 class="mt-7 mb-4">Sources</H2>
            <ul class="list-disc list-inside">
                <li v-for="(source, index) in news.sources" :key="index">
                    <a :href="source.url" target="_blank" rel="noreferrer" class="text-black text-body">{{
                            source.label
                        }}</a>
                </li>
                <li v-if="!news.sources?.length">
                    Aucune source pour l'instant.
                    <Link :href="route('news.edit', news)">Rajoutez-en une</Link>
                </li>
            </ul>

            <H2 class="mt-7 mb-4">Pour aller plus loin</H2>
            <ul class="list-disc list-inside">
                <li v-for="(resource, index) in news.resources" :key="index">
                    <a :href="resource.url" target="_blank" rel="noreferrer" class="text-black text-body">{{
                            resource.label
                        }}</a>
                </li>
                <li v-if="!news.resources?.length">
                    Aucune ressource pour l'instant.
                    <Link :href="route('news.edit', news)" class="text-black">Rajoutez-en une</Link>
                </li>
            </ul>

            <H2 class="mt-7 mb-4">Ne t'envole pas tout de suite ! </H2>
            <p>Tu as une une idée à jeter en piqué, une ressource à
                partager ? À ta plume !</p>

            <Link :href="route('news.edit', news)">
                <SecondaryButton class=" mt-6 ">Éditer</SecondaryButton>
            </Link>
            <div v-if="news.user_id === user.id">
                <DeleteNewsForm :news="news" class="mt-3" />
            </div>
        </div>

    </AuthenticatedLayout>
</template>
