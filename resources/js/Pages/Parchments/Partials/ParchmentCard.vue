<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
import ParchmentData = App.Data.ParchmentData;

    const props = defineProps<{
        parchment: ParchmentData;
    }>();
</script>

<template>
    <article class="p-6 text-gray-900" >
        <Link :href="route('parchments.show', parchment)">
            <h2 class="text-lg font-medium text-gray-900 hover:underline">{{ parchment.title }}</h2>
        </Link>
        <p class="mt-1 text-sm text-gray-600">{{ parchment.summary }}</p>
    </article>
</template>