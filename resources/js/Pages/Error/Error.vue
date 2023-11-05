<script setup lang="ts">
import InformationsLayout from '@/Layouts/InformationsLayout.vue';
import H1 from "@/Components/Primitives/H1.vue";

defineProps<{
    message: string
}>()

</script>
<template>
    <InformationsLayout>
        <div>
            <H1>Une erreur est survenue</H1>
            <p class="mt-2 text-red">{{ message }}</p>
        </div>
    </InformationsLayout>
</template>
