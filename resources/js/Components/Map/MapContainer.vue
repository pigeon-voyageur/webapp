<script setup lang="ts">
import {onMounted, ref, watch} from "vue";

import View from 'ol/View'
import Map from 'ol/Map'
import TileLayer from 'ol/layer/Tile'
import OSM from 'ol/source/OSM'

import 'ol/ol.css'
import VectorLayer from "ol/layer/Vector";
import VectorSource from "ol/source/Vector";
import {Coordinate} from "ol/coordinate";
import {MapBrowserEvent} from "openlayers";

const props = defineProps<{
    features: ol.Feature[],
    center?: Coordinate
}>();

const emit = defineEmits<{
    clickMap: [e: ol.events.Event],
    clickFeature: [feature: ol.Feature],
}>();

const vectorLayer = new VectorLayer();
const map = ref<Map | null>(null);
const mapRoot = ref(null);

watch(() => props.features, (value) => {
    vectorLayer.setSource(new VectorSource({
        features: value
    }))
});

onMounted(() => {
    vectorLayer.setSource(new VectorSource({
        features: props.features
    }))

    map.value = new Map({
        target: mapRoot.value,
        layers: [
            new TileLayer({
                source: new OSM() // tiles are served by OpenStreetMap
            }),
            vectorLayer
        ],

        view: new View({
            zoom: 0,
            center: props.center ?? [0, 0],
            constrainResolution: true
        }),
    })

    map.value.on('click', (e: MapBrowserEvent) => {
        const feature = map.value.forEachFeatureAtPixel(e.pixel, function (feature: ol.Feature) {
            return feature
        })

        if (feature) {
            emit('clickFeature', feature);
            return;
        }

        emit('clickMap', e);
    })
})
</script>
<template>
    <div ref="mapRoot">
    </div>
</template>

