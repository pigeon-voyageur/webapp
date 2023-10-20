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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="p-6 text-gray-900">{{ news.title }}</h2>
                    <p class="p-6 text-gray-900">{{ news.summary }}</p>
                    <a v-if="news.video" :href="news.video" class="p-6 text-gray-600">Voir la vidéo</a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
