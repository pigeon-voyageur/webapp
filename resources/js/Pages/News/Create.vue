<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import NewsForm from "@/Pages/News/Partials/NewsForm.vue";
import H1 from "@/Components/Primitives/H1.vue";</script>

<template>
    <Head>
        <title>Publier une information</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container py-6">
            <H1 class="text-blue">Publier une information</H1>
            <p class="mt-6 text-meta">Envie de faire parler votre plume ? Écrivez votre message ici...</p>

            <NewsForm class="mt-16" />
        </div>
    </AuthenticatedLayout>
</template>
