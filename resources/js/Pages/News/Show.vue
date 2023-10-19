<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Information</h2>
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
