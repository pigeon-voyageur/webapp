<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import NewsForm from "@/Pages/News/Partials/NewsForm.vue";
import H1 from "@/Components/Primitives/H1.vue";
import NewsData = App.Data.NewsData;
import NewsCategoryData = App.Data.NewsCategoryData;

defineProps<{
    news: NewsData
    newsCategories: Array<NewsCategoryData>
}>()
</script>

<template>
    <Head>
        <title>Modifier une information</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container py-6">
            <H1 class="text-blue">Modifier une information</H1>

            <NewsForm
                class="mt-16"
                :news-categories="newsCategories"
                :news="news"
            />
        </div>
    </AuthenticatedLayout>
</template>
