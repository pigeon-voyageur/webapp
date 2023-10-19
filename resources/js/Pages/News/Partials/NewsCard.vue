<script setup lang="ts">
import {Link} from '@inertiajs/vue3';
import NewsData = App.Data.NewsData;

const props = defineProps<{
    news: NewsData;
}>();
</script>

<template>
    <article class="p-6 text-gray-900">
        <Link :href="route('news.show', news)">
            <h2 class="text-lg font-medium text-gray-900 hover:underline">{{ news.title }}</h2>
        </Link>
        <p class="mt-1 text-sm text-gray-600">{{ news.summary }}</p>
    </article>
</template>
