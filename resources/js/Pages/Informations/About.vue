<script setup lang="ts">
import H1 from '@/Components/Primitives/H1.vue';
import InformationsLayout from "@/Layouts/InformationsLayout.vue";
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";

type Person = {
    name: string
    desc: string
    linkedin: string
    portfolio?: string
}

const persons: Person[] = [
    {
        name: "Cléo LAFFARGUE",
        desc: "Direction artistique & design d'interface, Motion design, Rédaction",
        portfolio: "https://cleolaffargue.netlify.app/",
        linkedin: "https://www.linkedin.com/in/cleolaffargue",
    },
    {
        name: "Perrine JOLY",
        desc: "Direction artistique & design d'interface, Motion design, Rédaction",
        portfolio: "https://www.behance.net/perrinejoly",
        linkedin: "https://www.linkedin.com/in/perrinejoly/",
    },
    {
        name: "Francia BIDZIMOU",
        desc: "Développement web fullstack, Design UX",
        portfolio: "https://www.franciabidzimou.com",
        linkedin: "https://www.linkedin.com/in/francia-b-4188981a4/",
    },
    {
        name: "Anaïs DELAVIER",
        desc: "Design UX, Stratégie de communication ",
        linkedin: "https://www.linkedin.com/in/ana%C3%AFs-delavier-b9706a231",
    },
    {
        name: "Safiya SEDDIKI",
        desc: "Design UX, Stratégie de communication ",
        linkedin: "https://www.linkedin.com/in/safiya-seddiki/",
    },
    {
        name: "Arthaud PROUST",
        desc: "Gestion projet, Développement web fullstack, Collaboration avec les UX/UI",
        portfolio: "https://arthaudproust.fr",
        linkedin: "https://www.linkedin.com/in/arthaud-proust",
    },
    {
        name: "Mikail DUMLU",
        desc: "",
        linkedin: "https://www.linkedin.com/in/d%C3%A9veloppeurweb-free-lance/",
    },
]

</script>
<template>
    <InformationsLayout>
        <H1>À propos</H1>

        <div>
            <H2>Pigeon c'est quoi?</H2>
            <p>
                Pigeon c'est un projet réalisé dans le cadre d'un projet du BUT MMI à l'IUT Montaigne.
            </p>
        </div>

        <div>
            <H2>Qui sommes-nous?</H2>
            <p>
                Une équipe de 7 étudiants MMI Bordeaux:
            </p>
            <article class="mb-6" v-for="(person, index) in persons" :key="index">
                <H3>{{ person.name }}</H3>
                <p class="!mb-0">{{ person.desc }}</p>
                <div class="space-x-4">
                    <a v-if="person.portfolio" :href="person.portfolio" target="_blank" rel="noreferrer">Portfolio</a>
                    <a :href="person.linkedin" target="_blank" rel="noreferrer">Linkedin</a>
                </div>
            </article>
        </div>
    </InformationsLayout>
</template>
