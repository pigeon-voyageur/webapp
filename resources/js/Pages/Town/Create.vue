<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import H1 from "@/Components/Primitives/H1.vue";
import TownForm from "@/Pages/Town/Partials/TownForm.vue";</script>

<template>
    <Head>
        <title>Créer un village</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container py-6">
            <H1 class="text-blue">Créer un village</H1>
            <p class="mt-6 text-meta">Partagez les informations que vous avez récupérer avec vos amis.</p>

            <TownForm class="mt-16" />
        </div>
    </AuthenticatedLayout>
</template>
