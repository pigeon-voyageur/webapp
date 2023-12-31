<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router, useForm} from '@inertiajs/vue3';
import MapContainer from "@/Components/Map/MapContainer.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {fromLonLat} from "ol/proj";
import {computed, onMounted, onUnmounted, ref} from "vue";
import {UseGeolocation} from "@vueuse/components";
import {useElementSize, useGeolocation, useParentElement} from "@vueuse/core";
import PigeonPerch from "@/Components/Pigeon/PigeonPerch.vue";
import Modal from '@/Components/Modal.vue';
import PrimaryButton from "@/Components/Primitives/PrimaryButton.vue";
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import {getNewsStyle} from "@/Components/Map/Styles/news.style";
import H3 from "@/Components/Primitives/H3.vue";
import PigeonSentModal from "@/Components/Pigeon/PigeonSentModal.vue";
import MapLegend from "@/Components/Map/MapLegend.vue";
import NewsData = App.Data.NewsData;
import PigeonData = App.Data.PigeonData;

const props = defineProps<{
    news: Array<NewsData>;
    pigeon: PigeonData;
}>();

const map = ref<HTMLElement>();
const parentElement = useParentElement(map);
const parentElementSize = useElementSize(parentElement);

let newsStatePollingInterval: number;

onMounted(() => {
    newsStatePollingInterval = setInterval(() => router.reload({only: ['news', 'pigeon']}), 10_000);
})

onUnmounted(() => {
    clearInterval(newsStatePollingInterval);
})

const features = computed(() => props.news.map(news => {
    let e = new Feature({
        geometry: new Point(fromLonLat([news.lng, news.lat])),
        data: {
            newsId: news.id,
            newsUserId: news.user_id,
        },
    })
    e.setStyle(getNewsStyle(news, props.pigeon))
    return e;
}))

function handleClickFeature(feature: Feature): void {
    const newsId = feature.get('data').newsId;

    const newsUserId = feature.get('data').newsUserId;

    const arrivedNews = props.pigeon.news.find((pigeonNews) => pigeonNews.id === newsId);

    if (arrivedNews?.message?.is_arrived || newsUserId === props.pigeon.user_id) {
        router.visit(route('news.show', newsId));
        return;
    }

    if (props.pigeon.isTravelling) {
        pigeonSentModalOpened.value = true;
        return;
    }

    const news = props.news.find((news => news.id === newsId))

    if (!news) {
        return;
    }

    confirmGetNews(news)
}


const newsToGet = ref<NewsData | null>(null);
const pigeonSentModalOpened = ref<boolean>(false);
const legendModalOpened = ref<boolean>(false);
const form = useForm<{
    lat: number | null,
    lng: number | null,
}>({
    lat: 44.836151,
    lng: -0.580816,
});
const {coords, locatedAt, error} = useGeolocation()

function confirmGetNews(news: NewsData) {
    newsToGet.value = news;
}

function getNews() {
    if (!newsToGet.value) {
        return;
    }

    if (coords.value.latitude && coords.value.latitude !== Infinity) {
        form.lat = coords.value.latitude;
    }

    if (coords.value.longitude && coords.value.longitude !== Infinity) {
        form.lng = coords.value.longitude;
    }

    form.post(route('pigeon.get-news', newsToGet.value?.id), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal()
            pigeonSentModalOpened.value = true;
        },
        onFinish: () => {
            form.reset();
            router.reload()
        },
    });
}

function closeModal() {
    newsToGet.value = null;

    form.reset()
}

function handlePerchClick() {
    if (props.pigeon.isTravelling) {
        pigeonSentModalOpened.value = true
        return;
    }
}

function getLegend() {
    legendModalOpened.value = true

}

</script>

<template>
    <Head>
        <title>Informations</title>
    </Head>

    <AuthenticatedLayout>
        <button class="absolute m-3 z-50 h-9 w-9 bg-pink border flex justify-center content-center rounded-full" @click="getLegend">
            <span class="not-sr-only text-button p-1">?</span>
            <span class="sr-only">Voir la légende de la carte</span>
        </button>
        <MapLegend :show="legendModalOpened" @close="legendModalOpened=false" />

        <MapContainer
            ref="map"
            class="h-full"
            :style="`height: ${parentElementSize.height.value}px`"
            :features="features"
            @clickFeature="handleClickFeature"
        />

        <div class="fixed max-w-mobile w-full bottom-20 pointer-events-none flex justify-end p-4">
            <PigeonPerch :pigeon="pigeon" @click="handlePerchClick" />
        </div>

        <Modal :show="!!newsToGet" @close="closeModal">
            <UseGeolocation v-slot="{ coords: { latitude, longitude } }">
                <form @submit.prevent="getNews" class="p-6 space-y-2">
                    <H3>
                        Je dois aller chercher cette information ?
                    </H3>

                    <p v-if="form.errors.lat || form.errors.lng" class="text-red">
                        Votre position est requise pour que je puisse partir.<br>
                        Autorisez la géolocalisation pour que je sache où vous retrouver !
                    </p>

                    <div class="flex flex-col gap-2">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Oui, celle là !
                        </PrimaryButton>

                        <QuaternaryButton type="button" @click="closeModal">
                            Non, annuler
                        </QuaternaryButton>
                    </div>
                </form>
            </UseGeolocation>
        </Modal>

        <PigeonSentModal :show="pigeonSentModalOpened" @close="pigeonSentModalOpened=false" />
    </AuthenticatedLayout>
</template>
