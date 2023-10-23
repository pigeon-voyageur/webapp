<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import MapContainer from "@/Components/Map/MapContainer.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {fromLonLat} from "ol/proj";
import {ref} from "vue";
import {useElementSize, useParentElement} from "@vueuse/core";
import NewsData = App.Data.NewsData;
import PigeonData = App.Data.PigeonData;

const props = defineProps<{
    news: Array<NewsData>;
    pigeon: PigeonData;
}>();

const map = ref<HTMLElement>();
const parentElement = useParentElement(map);
const parentElementSize = useElementSize(parentElement);

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
        <MapContainer ref="map" class="h-full" :style="`height: ${parentElementSize.height.value}px`" :features="features"
                      @clickFeature="handleClickFeature" />
    </AuthenticatedLayout>
</template>
