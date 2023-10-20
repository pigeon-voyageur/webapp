<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import MapContainer from "@/Components/Map/MapContainer.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {fromLonLat} from "ol/proj";
import H2 from "@/Components/Primitives/H2.vue";
import NewsData = App.Data.NewsData;

const props = defineProps<{
    news: Array<NewsData>;
}>();

const features = props.news.map(news => new Feature({
    geometry: new Point(fromLonLat([news.lng, news.lat])),
    data: {
        newsId: news.id
    }
}))

function handleClickFeature(feature: Feature): void {
    const newsId = feature.get('data').newsId;

    router.visit(route('news.show', newsId))
}

</script>

<template>
    <Head>
        <title>Informations</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <H2>Informations</H2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <MapContainer class="w-full aspect-video" :features="features" @clickFeature="handleClickFeature" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
