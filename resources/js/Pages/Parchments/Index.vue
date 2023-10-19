<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import MapContainer from "@/Components/Map/MapContainer.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {fromLonLat} from "ol/proj";
import ParchmentData = App.Data.ParchmentData;


const props = defineProps<{
    parchments: Array<ParchmentData>;
}>();

const features = props.parchments.map(parchment => new Feature({
    geometry: new Point(fromLonLat([parchment.lng, parchment.lat])),
    data: {
        parchmentId: parchment.id
    }
}))

function handleClickFeature(feature) {
    const parchmentId = feature.get('data').parchmentId;

    router.visit(route('parchments.show', parchmentId))
}

</script>

<template>
    <Head>
        <title>Parchemins</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Parchemins</h2>
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
