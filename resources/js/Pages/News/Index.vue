<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import MapContainer from "@/Components/Map/MapContainer.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {fromLonLat} from "ol/proj";
import {ref} from "vue";
import {useElementSize, useParentElement} from "@vueuse/core";
import PigeonPerch from "@/Components/Pigeon/PigeonPerch.vue";
import Modal from '@/Components/Modal.vue';
import PrimaryButton from "@/Components/Primitives/PrimaryButton.vue";
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import {disabledNewsStyle, newsStyle} from "@/Components/Map/Styles/news.style";
import H3 from "@/Components/Primitives/H3.vue";
import PigeonSentModal from "@/Components/Pigeon/PigeonSentModal.vue";
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
    },
    style: newsStyle
}))

function handleClickFeature(feature: Feature): void {
    if (props.pigeon.isTravelling) {
        return;
    }

    const newsId = feature.get('data').newsId;

    const news = props.news.find((news => news.id === newsId))

    confirmGetNews(news)
}


const newsToGet = ref<NewsData | null>(null);
const pigeonSentModalOpened = ref<boolean>(false);
const form = useForm({});

function confirmGetNews(news: NewsData) {
    newsToGet.value = news;
}

function getNews() {
    form.post(route('pigeon.get-news', newsToGet.value), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal()
            pigeonSentModalOpened.value = true;
        },
        onFinish: () => {
            form.reset();
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

</script>

<template>
    <Head>
        <title>Informations</title>
    </Head>

    <AuthenticatedLayout>
        <MapContainer
            ref="map"
            class="h-full"
            :style="`height: ${parentElementSize.height.value}px`"
            :features="features"
            :vector-style="pigeon.isTravelling ? disabledNewsStyle : newsStyle"
            @clickFeature="handleClickFeature"
        />

        <div class="absolute right-0 bottom-24 pointer-events-none">
            <PigeonPerch :pigeon="pigeon" @click="handlePerchClick" />
        </div>

        <Modal :show="!!newsToGet" @close="closeModal">
            <form @submit.prevent="getNews" class="p-6">
                <H3 class="mb-4">
                    Je dois aller chercher cette information ?
                </H3>

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
        </Modal>

        <PigeonSentModal :show="pigeonSentModalOpened" @close="pigeonSentModalOpened=false" />
    </AuthenticatedLayout>
</template>
