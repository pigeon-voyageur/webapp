<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';
import LogoutForm from "@/Pages/Profile/Partials/LogoutForm.vue";

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
            <h2>Modifier mon profil</h2>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-24">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                    />

                    <UpdatePasswordForm />

                    <div class="space-y-2">
                        <LogoutForm />
                        <DeleteUserForm />
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
