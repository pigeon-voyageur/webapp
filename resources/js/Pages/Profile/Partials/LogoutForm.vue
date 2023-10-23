<script setup lang="ts">import {Link} from '@inertiajs/vue3';
import TertiaryButton from "@/Components/Primitives/TertiaryButton.vue";</script>

<template>
    <section>
        <Link :href="route('logout')" as="div" method="post">
            <TertiaryButton>Déconnexion</TertiaryButton>
        </Link>
    </section>
</template>
