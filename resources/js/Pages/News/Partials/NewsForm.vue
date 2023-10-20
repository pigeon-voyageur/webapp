<script setup lang="ts">
import NewsData = App.Data.NewsData;
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextareaInput from "@/Components/Form/TextareaInput.vue";
import MapContainer from "@/Components/Map/MapContainer.vue";
import {computed} from "vue";
import {fromLonLat, toLonLat} from 'ol/proj'
import NumberInput from "@/Components/Form/NumberInput.vue";
import {Feature} from "ol";
import {Point} from "ol/geom";
import {Coordinate} from "ol/coordinate";
import {MapBrowserEvent} from "openlayers";
import TextListInput from "@/Components/Form/TextListInput.vue";

const props = defineProps<{
    news?: NewsData;
}>();

const form = useForm({
    title: props.news?.title ?? '',
    summary: props.news?.summary ?? '',
    video: props.news?.video ?? '',
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
    <section>
        <header>
            <template v-if="news">
                <h2 class="text-lg font-medium text-gray-900">Modifier une information</h2>

                <p class="mt-1 text-sm text-gray-600">
                    Modifiez une information ou contribuez à son amélioration.
                </p>
            </template>
            <template v-else>
                <h2 class="text-lg font-medium text-gray-900">Publier une information</h2>

                <p class="mt-1 text-sm text-gray-600">
                    Ajoutez une information.
                </p>
            </template>
        </header>

        <form @submit.prevent="handleSubmit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="title" value="Titre" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="summary" value="Résumé" />

                <TextareaInput
                    id="summary"
                    type="text"
                    class="mt-1 block w-full"
                    rows="6"
                    v-model="form.summary"
                    required
                />

                <InputError class="mt-2" :message="form.errors.summary" />
            </div>

            <div>
                <InputLabel for="sources" value="Sources du résumé" />

                <TextListInput
                    id="summary"
                    placeholder="Ex: https://lemonde.com"
                    class="mt-1 block w-full"
                    v-model="form.sources"
                />

                <InputError class="mt-2" :message="form.errors.sources" />
            </div>

            <div>
                <InputLabel for="video" value="Vidéo" />

                <TextInput
                    id="video"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.video"
                />

                <InputError class="mt-2" :message="form.errors.video" />
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

            <MapContainer class="w-full aspect-video" :features="features" :center="mapCenter" @clickMap="handleClickMap" />

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
    </section>
</template>
