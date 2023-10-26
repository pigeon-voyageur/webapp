<script setup lang="ts">
import {usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const user = usePage().props.auth.user;
</script>

<template>
    <AuthenticatedLayout v-if="user">
        <div class="container py-8 space-y-16 [&_p]:mb-4">
            <slot />
        </div>
    </AuthenticatedLayout>
    <GuestLayout v-else>
        <div class="space-y-16 [&_p]:mb-4">
            <slot />
        </div>
    </GuestLayout>
</template>
