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
import {Collection, Feature} from "ol";
import {defaults as defaultControls} from 'ol/control.js';
import {Geometry} from "ol/geom";
import {MapBrowserEvent} from "openlayers";
import {newsStyle} from "@/Components/Map/Styles/news.style";

const props = defineProps<{
    features: Feature<Geometry>[] | Collection<Feature<Geometry>> | undefined,
    center?: Coordinate
}>();

const emit = defineEmits<{
    clickMap: [e: MapBrowserEvent],
    clickFeature: [feature: Feature],
}>();

const vectorLayer = new VectorLayer({
    style: newsStyle
});
const map = ref(new Map());
const mapRoot = ref<HTMLElement | null>(null);

watch(() => props.features, (value) => {
    vectorLayer.setSource(new VectorSource({
        features: value
    }))
});

onMounted(() => {
    if (!mapRoot.value) {
        return;
    }

    vectorLayer.setSource(new VectorSource({
        features: props.features
    }))

    map.value = new Map({
        controls: defaultControls({
            zoom: false,
            attribution: false
        }),
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
            constrainResolution: true,
            enableRotation: false
        }),
    })

    if (!map.value) {
        return;
    }

    map.value.on('click', (e) => {
        const mapEvent = e as unknown as MapBrowserEvent;
        const feature = map.value.forEachFeatureAtPixel(mapEvent.pixel, function (feature) {
            return feature
        })

        if (feature) {
            emit('clickFeature', feature as unknown as Feature);
            return;
        }

        emit('clickMap', mapEvent);
    })
})
</script>
<template>
    <div ref="mapRoot">
    </div>
</template>

