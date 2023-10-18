<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import ParchmentForm from "@/Pages/Parchments/Partials/ParchmentForm.vue";
import ParchmentData = App.Data.ParchmentData;

defineProps<{
    parchment: ParchmentData
}>()
</script>

<template>
    <Head>
        <title>Modifier un parchemin</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier un parchemin</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <ParchmentForm :parchment="parchment" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
