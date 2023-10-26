<script setup lang="ts">
import H1 from '@/Components/Primitives/H1.vue';
import InformationsLayout from "@/Layouts/InformationsLayout.vue";
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";</script>
<template>
    <InformationsLayout>
        <H1>Charte éditoriale</H1>

        <div>
            <H2> Titre de l'article</H2>
            <p>
                Concis, original et accrocheur.
            </p>
            <p>
                Si vous ne trouvez pas de titre, vous pouvez écrire 3 termes/mot-clés associés au sujet (on appelle ça
                la technique Pomme-Poire-Scoubidou)
            </p>
        </div>

        <div>
            <H2>Structure du résumé</H2>
            <H3 class="mt-8">Longueur</H3>
            <p>
                Entre 100 et 250 mots pour une lecture rapide et engageante.
            </p>

            <H3 class="mt-8">Introduction / Accroche</H3>
            <p>
                Pas de phrases d'introduction lourdes, allez directement au cœur du sujet. Commencer avec une phrase humoristique ou douce (ex : ça
                fond dans la banquise)
            </p>

            <H3 class="mt-8">Décodage des Sigles</H3>
            <p>
                Intégrer des liens redirigeant vers vos sources (Ex. : Wikipédia, Le monde, Youtube, Larousse…) pour fournir une explication sur les
                termes complexes.
            </p>

            <H3 class="mt-8">Contexte en Clair</H3>
            <p>
                Décrire brièvement l’événement / l’actualité et les personnes/pays impliqué(e)s.
            </p>

            <H3 class="mt-8">Tonalité générale</H3>
            <p>
                Utiliser l'humour pour rendre le sujet accessible et intéressant avec des métaphores amusantes en utilisant le
                jargon établit.
            </p>
            <p>
                Utiliser une écriture vivante, des phrases courtes, dynamiques. Privilégier le présent.
            </p>
        </div>

    </InformationsLayout>
</template>
