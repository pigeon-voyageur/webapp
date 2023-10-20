<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import MapContainer from "@/Components/Map/MapContainer.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {fromLonLat} from "ol/proj";
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";
import Text from "@/Components/Primitives/Text.vue";
import Quote from "@/Components/Primitives/Quote.vue";
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
                    <div class="flex flex-col gap-4 mb-6">
                        <H1>Ça fond de plus en plus vite...</H1>
                        <H2>Ça fond de plus en plus vite...</H2>
                        <H3>Ça fond de plus en plus vite...</H3>
                        <Text>
                            Lorem ipsum dolor sit amet consectetur. Iaculis commodo a elit a viverra. Augue vel diam id velit a purus ultrices mi. Sed
                            lectus sed massa fermentum aliquam. Lectus semper ac eget fusce aliquet amet mauris scelerisque molestie.
                        </Text>
                        <a href="#">Lien</a>
                        <Quote>Ça fond de plus en plus vite dit le pingouin sur la banquise, les pieds à moitié dans l'eau ...</Quote>
                    </div>

                    <MapContainer class="w-full aspect-video" :features="features" @clickFeature="handleClickFeature" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
