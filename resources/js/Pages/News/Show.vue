<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import H2 from "@/Components/Primitives/H2.vue";
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
            <H2>Information</H2>
            <Link :href="route('news.edit', news)">
                Éditer
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2>{{ news.title }}</h2>
                    <p>{{ news.summary }}</p>

                    <h3 class="mt-2">Sources</h3>
                    <ul>
                        <li v-for="(source, index) in news.sources" :key="index">
                            <a :href="source" target="_blank" rel="noreferrer">{{ source }}</a>
                        </li>
                        <li v-if="!news.sources?.length">
                            Aucune source pour l'instant.
                            <Link :href="route('news.edit', news)">Rajoutez-en une</Link>
                        </li>
                    </ul>

                    <hr class="mt-4 mb-2">
                    <a v-if="news.video" :href="news.video">Voir la vidéo</a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
