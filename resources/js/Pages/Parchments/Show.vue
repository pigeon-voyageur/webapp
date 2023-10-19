<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import ParchmentData = App.Data.ParchmentData;

defineProps<{
    parchment: ParchmentData;
}>();
</script>

<template>
    <Head>
        <title>Parchemin</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Parchemin</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="p-6 text-gray-900">{{ parchment.title}}</h2>
                    <p class="p-6 text-gray-900">{{ parchment.summary}}</p>
                    <a v-if="parchment.video" :href="parchment.video" class="p-6 text-gray-600" >Voir la vidéo</a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
