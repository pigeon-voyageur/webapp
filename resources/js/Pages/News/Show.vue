<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import H1 from "@/Components/Primitives/H1.vue";
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";
import SecondaryButton from '@/Components/Primitives/SecondaryButton.vue';
import { ChevronLeftIcon } from '@heroicons/vue/24/outline';
import NewsData = App.Data.NewsData;

defineProps<{
    news: NewsData;
}>();

</script>

<template>
    <Head>
        <title>Information</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <Link :href="route('news.index')" class="text-meta text-black no-underline flex gap-1.5 mt-5">
            <ChevronLeftIcon class="h-5" /> Retour
            </Link>
        </template>

        <img src="/assets/images/auth-bg.png" alt="" class="absolute top-0 left-0 w-full -z-10" />

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <H1 class="text-blue">{{ news.title }}</H1>
                    <p class="text-meta my-2">{{ news.category.title }}</p>

                    <H2 class="mt-7 mb-4"> En quelques mots...</H2>
                    <p class="text-body">{{ news.summary }}</p>

                    <H2 class="mt-7 mb-4">Sources</H2>
                    <ul class="list-disc list-inside">
                        <li v-for="(source, index) in news.sources" :key="index">
                            <a :href="source.url" target="_blank" rel="noreferrer" class="text-black text-body">{{ source.label }}</a>
                        </li>
                        <li v-if="!news.sources?.length">
                            Aucune source pour l'instant.
                            <Link :href="route('news.edit', news)">Rajoutez-en une</Link>
                        </li>
                    </ul>

                    <H2 class="mt-7 mb-4">Pour aller plus loin</H2>
                    <ul>
                        <li v-for="(resource, index) in news.resources" :key="index">
                            <a :href="resource.url" target="_blank" rel="noreferrer" class="text-black text-body">{{ resource.label }}</a>
                        </li>
                        <li v-if="!news.resources?.length">
                            Aucune ressource pour l'instant.
                            <Link :href="route('news.edit', news)" class="text-black">Rajoutez-en une</Link>
                        </li>
                    </ul>

                    <H2 class="mt-7 mb-4">Éditer</H2>
                    <p>Ne t'envole pas tout de suite ! Tu as une une idée à jeter en piqué, une ressource à
                        partager ? À ta plume !</p>
                    <SecondaryButton class="mt-6">Éditer</SecondaryButton>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
