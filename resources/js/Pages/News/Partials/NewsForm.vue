<script setup lang="ts">
import NewsData = App.Data.NewsData;
import NewsCategoryData = App.Data.NewsCategoryData;
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from '@/Components/Primitives/PrimaryButton.vue';
import TextareaInput from "@/Components/Form/TextareaInput.vue";
import MapContainer from "@/Components/Map/MapContainer.vue";
import {computed} from "vue";
import {fromLonLat, toLonLat} from 'ol/proj'
import NumberInput from "@/Components/Form/NumberInput.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {Coordinate} from "ol/coordinate";
import {MapBrowserEvent} from "openlayers";
import LinkListInput from "@/Components/Form/LinkListInput.vue";
import InputHint from "@/Components/Form/InputHint.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";

const props = defineProps<{
    news?: NewsData;
    newsCategories: Array<NewsCategoryData>;
}>();

const form = useForm({
    title: props.news?.title ?? '',
    news_category_id: props.news?.news_category_id ?? props.newsCategories[0].id,
    summary: props.news?.summary ?? '',
    lat: props.news?.lat ?? 0,
    lng: props.news?.lng ?? 0,
    sources: props.news?.sources ?? [],
});

const features = computed(() => {
    return [
        new Feature({
            geometry: new Point(fromLonLat([form.lng, form.lat])),
        })
    ]
});

const newsCategoriesLines = computed(() => props.newsCategories.map((category) => ({
    value: category.id,
    label: category.title
})))

const mapCenter = computed(() => {
    if (!props.news) {
        return [0, 0]
    }

    return fromLonLat([props.news.lng, props.news.lat])
})

function handleClickMap(e: MapBrowserEvent) {
    const [newLng, newLat] = toLonLat(e.coordinate as Coordinate);
    form.lng = newLng;
    form.lat = newLat;
}

function handleSubmit() {
    if (props.news) {
        form.patch(route('news.update', props.news))
        return;
    }

    form.post(route('news.store'));
}

</script>

<template>
    <form @submit.prevent="handleSubmit" class="relative z-0 space-y-6 bg-yellow -m-3 p-3 rounded-xl">
        <img src="/assets/images/bg.png" alt="" height="719" width="1000" class="absolute h-full w-full top-0 left-0 -z-10 rounded-xl" />

        <div>
            <InputLabel for="title" value="Titre" />

            <TextInput
                id="title"
                type="text"
                placeholder=""
                v-model="form.title"
                required
                autofocus
            />

            <InputError :message="form.errors.title" />
        </div>

        <div>
            <InputLabel for="news_category_id" value="Catégorie" />

            <SelectInput
                id="news_category_id"
                v-model="form.news_category_id"
                required
                :lines="newsCategoriesLines"
            />

            <InputError :message="form.errors.title" />
        </div>

        <div>
            <InputLabel for="summary" value="Résumé de la situation" />

            <InputHint value="Soyez objectif, essayez de conserver un ton neutre" />

            <TextareaInput
                id="summary"
                type="text"
                rows="6"
                v-model="form.summary"
                required
            />

            <InputError class="mt-2" :message="form.errors.summary" />
        </div>

        <div>
            <InputLabel for="sources" value="Liens vers des sources" />

            <LinkListInput
                id="sources"
                class="mt-1 block w-full"
                v-model="form.sources"
                :errors="form.errors"
            />

            <InputError class="mt-2" :message="form.errors.sources" />
        </div>

        <div>
            <InputLabel value="Emplacement" />

            <MapContainer class="mt-2 w-full border aspect-video" :features="features" :center="mapCenter" @clickMap="handleClickMap" />
        </div>

        <div>
            <InputLabel for="lat" value="Latitude" />

            <NumberInput
                id="lat"
                type="text"
                class="mt-1 block w-full"
                v-model="form.lat"
            />

            <InputError class="mt-2" :message="form.errors.lat" />
        </div>

        <div>
            <InputLabel for="lng" value="Longitude" />

            <NumberInput
                id="lng"
                type="text"
                class="mt-1 block w-full"
                v-model="form.lng"
            />

            <InputError class="mt-2" :message="form.errors.lng" />
        </div>

        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">{{ news ? 'Enregistrer' : 'Publier' }}</PrimaryButton>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Enregistré.</p>
            </Transition>
        </div>
    </form>
</template>
