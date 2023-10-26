<script setup lang="ts">
import H1 from '@/Components/Primitives/H1.vue';
import InformationsLayout from "@/Layouts/InformationsLayout.vue";
import H2 from "@/Components/Primitives/H2.vue";
import {Link} from "@inertiajs/vue3";</script>
<template>
    <InformationsLayout>
        <H1>Mentions légales</H1>

        <div>
            <H2>Note d'information</H2>
            <p>
                Ce site et l'entièreté du contenu en rapport ont été réalisé dans le cadre d'un projet du BUT MMI à l'IUT Montaigne.
            </p>
        </div>

        <div>
            <H2>Identité et contact</H2>
            <p>
                Le site est édité par Pigeon, Association (fictive) loi 1901.
            </p>
        </div>

        <div>
            <H2>Contact</H2>
            <p>
                Vous pouvez nous contacter à l'adresse contact@pigeon.arthaud.ovh.
            </p>
            <p>
                Le siège de l'association est domicilié au 1 Rue Jacques Ellul, 33800 Bordeaux.
            </p>
        </div>

        <div>
            <H2>Hébergement</H2>
            <p>
                Le site est hébergé chez o2switch.com
            </p>
            <ul class="list-disc ml-4 pb-4">
                <li>Adresse: Chemin des Pardiaux 63000 Clermont-Ferrand</li>
                <li>Tel: 04 44 44 60 40</li>
                <li>E-mail: support@o2switch.fr</li>
            </ul>
        </div>

        <div>
            <H2>Conditions d'utilisation</H2>
            <p>
                <Link :href="route('informations.tos')">Voir les conditions d'utilisation</Link>
            </p>
        </div>

        <div>
            <H2>Protection des données</H2>
            <p>
                <Link :href="route('informations.gdpr')">Voir le Règlement Général de la Protection des données</Link>
            </p>
        </div>
    </InformationsLayout>
</template>
