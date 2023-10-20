<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import NewsForm from "@/Pages/News/Partials/NewsForm.vue";
import H2 from "@/Components/Primitives/H2.vue";
import NewsData = App.Data.NewsData;

defineProps<{
    news: NewsData
}>()
</script>

<template>
    <Head>
        <title>Modifier un parchemin</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <H2>Modifier un parchemin</H2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <NewsForm :news="news" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
