<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, router} from '@inertiajs/vue3';
import LogoutForm from "@/Pages/Profile/Partials/LogoutForm.vue";
import H1 from "@/Components/Primitives/H1.vue";
import H2 from "@/Components/Primitives/H2.vue";
import SecondaryButton from "@/Components/Primitives/SecondaryButton.vue";

defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
}>();
</script>

<template>
    <Head>
        <title>Mon profil</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container pt-8">
            <H1>Mon profil</H1>

            <div class="py-12 space-y-24">
                <section class="space-y-2">
                    <header>
                        <H2>Gestion du profil</H2>
                    </header>

                    <SecondaryButton type="button" @click="router.visit(route('profile.edit'))">
                        Modifier mon profil
                    </SecondaryButton>

                    <LogoutForm />
                </section>

                <section class="space-y-2">
                    <header>
                        <H2>Informations</H2>
                    </header>

                    <div class="flex flex-col gap-2">
                        <Link :href="route('informations.legal-notice')">Mentions légales</Link>
                        <Link :href="route('informations.tos')">CGU</Link>
                        <Link :href="route('informations.gdpr')">RGPD</Link>
                        <Link :href="route('informations.about')">À propos</Link>
                        <Link :href="route('informations.editorial-charter')">Charte éditoriale</Link>
                    </div>
                </section>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
