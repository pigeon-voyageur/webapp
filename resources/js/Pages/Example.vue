<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head} from '@inertiajs/vue3';
import H1 from "@/Components/Primitives/H1.vue";
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";
import Text from "@/Components/Primitives/Text.vue";
import Quote from "@/Components/Primitives/Quote.vue";
import SecondaryButton from "@/Components/Primitives/SecondaryButton.vue";
import TertiaryButton from "@/Components/Primitives/TertiaryButton.vue";
import PrimaryButton from "@/Components/Primitives/PrimaryButton.vue";
import DangerButton from "@/Components/Primitives/DangerButton.vue";</script>

<template>
    <Head>
        <title>Informations</title>
    </Head>

    <GuestLayout>
        <div class="flex flex-col gap-4 my-6">
            <H1>Ça fond de plus en plus vite...</H1>
            <H2>Ça fond de plus en plus vite...</H2>
            <H3>Ça fond de plus en plus vite...</H3>
            <Text>
                Lorem ipsum dolor sit amet consectetur. Iaculis commodo a elit a viverra. Augue vel diam id velit a purus ultrices mi. Sed
                lectus sed massa fermentum aliquam. Lectus semper ac eget fusce aliquet amet mauris scelerisque molestie.
            </Text>
            <a href="#">Lien</a>
            <Quote>Ça fond de plus en plus vite dit le pingouin sur la banquise, les pieds à moitié dans l'eau ...</Quote>

            <PrimaryButton>Button primary</PrimaryButton>
            <SecondaryButton>Button secondary</SecondaryButton>
            <TertiaryButton>Button tertiary</TertiaryButton>
            <DangerButton>Button danger</DangerButton>
        </div>
    </GuestLayout>
</template>
