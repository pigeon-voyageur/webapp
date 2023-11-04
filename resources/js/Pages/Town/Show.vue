<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage} from '@inertiajs/vue3';
import H1 from "@/Components/Primitives/H1.vue";
import NewsCard from "@/Components/News/NewsCard.vue";
import H2 from "@/Components/Primitives/H2.vue";
import LeaveTownForm from "@/Pages/Town/Partials/LeaveTownForm.vue";
import {computed} from "vue";
import TownData = App.Data.TownData;
import UserData = App.Data.UserData;

const props = defineProps<{
    town: TownData
}>();

const user: UserData = usePage().props.auth.user;

const friends = computed(() => props.town.users.filter(friend => friend.id !== user.id));
const friendsNews = computed(() => friends.value.reduce((allNews, friend) => {
    const friendLastNews = friend.pigeon?.news[0];
    if (friendLastNews && !allNews.find((n) => n.id === friendLastNews.id)) {
        allNews.push(friendLastNews)
    }
    return allNews
}, []))
</script>

<template>
    <Head>
        <title>Mon village</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container py-6 space-y-6">
            <H1 class="text-blue">Mon village</H1>
            <p class="text-meta">Partagez les informations que vous avez récupérer avec vos amis.</p>

            <LeaveTownForm />

            <div class="space-y-4">
                <H2>Vos amis</H2>
                <template v-for="friend in friends">
                    <p>{{ friend.name }}</p>
                </template>
            </div>

            <div class="space-y-4">
                <H2>Articles lus par vos amis</H2>
                <template v-for="news in friendsNews">
                    <NewsCard :news="news" />
                </template>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
