<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage} from '@inertiajs/vue3';
import H1 from "@/Components/Primitives/H1.vue";
import NewsCard from "@/Components/News/NewsCard.vue";
import H2 from "@/Components/Primitives/H2.vue";
import LeaveTownForm from "@/Pages/Town/Partials/LeaveTownForm.vue";
import {computed} from "vue";
import CopyText from "@/Components/Form/CopyText.vue";
import TownData = App.Data.TownData;
import UserData = App.Data.UserData;
import NewsData = App.Data.NewsData;

const props = defineProps<{
    town: TownData
    maxCitizen: number
}>();

const user: UserData = usePage().props.auth.user;

const townNews = computed<Array<{ news: NewsData, user: UserData }>>(() => props.town.users.reduce((allNews, citizen) => {
    const citizenLastNews = citizen.pigeon?.news[0];
    if (citizenLastNews && !allNews.find((n) => n.id === citizenLastNews.id)) {
        allNews.push({
            news: citizenLastNews,
            user: citizen,
        });
    }
    return allNews
}, []))
</script>

<template>
    <Head>
        <title>Mon village</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container py-6 space-y-12">
            <H1 class="text-blue">Mon village</H1>

            <div class="space-y-2">
                <H2>Informations du village</H2>
                <p>Ce sont les dernières informations récupérées par les membres du village.</p>
                <div class="space-y-4">
                    <template v-for="{news, user} in townNews">
                        <article class="px-3 py-3 bg-beige rounded-xl">
                            <header class="mb-2">
                                <p class="text-meta">Récupéré par {{ user.name }}</p>
                            </header>
                            <NewsCard :news="news" />
                        </article>
                    </template>
                </div>
            </div>

            <div class="space-y-2">
                <H2>Membres du village ({{ town.users.length }}/{{ maxCitizen }})</H2>
                <p>{{ town.users.map((citizen => user.id === citizen.id ? citizen.name + ' (vous)' : citizen.name)).join(', ') }}</p>
            </div>

            <div class="space-y-2">
                <H2>Gestion du village</H2>
                <template v-if="town.users.length < maxCitizen">
                    <p>Code d'invitation :</p>
                    <CopyText :value="route('town.join', [town, town.join_code])" />
                </template>
                <p v-else>Le village est plein, vous ne pouvez inviter personne d'autre</p>
                <LeaveTownForm class="pt-4" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
