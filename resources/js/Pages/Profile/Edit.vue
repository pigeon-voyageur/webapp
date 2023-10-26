<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head, Link} from '@inertiajs/vue3';
import LogoutForm from "@/Pages/Profile/Partials/LogoutForm.vue";
import H1 from "@/Components/Primitives/H1.vue";
import H2 from "@/Components/Primitives/H2.vue";

defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
}>();
</script>

<template>
    <Head>
        <title>Modifier mon profil</title>
    </Head>

    <AuthenticatedLayout>
        <div class="container pt-8">
            <H1>Modifier mon profil</H1>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-24">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                    />

                    <UpdatePasswordForm />

                    <section class="space-y-2">
                        <header>
                            <H2>Partir</H2>
                        </header>

                        <LogoutForm />
                        <DeleteUserForm />
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
        </div>

    </AuthenticatedLayout>
</template>
