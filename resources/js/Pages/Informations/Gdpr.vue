<script setup lang="ts">
import H1 from '@/Components/Primitives/H1.vue';
import InformationsLayout from "@/Layouts/InformationsLayout.vue";
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";
import H4 from "@/Components/Primitives/H4.vue";</script>
<template>
    <InformationsLayout>
        <H1>Règlement Général de la Protection des Donnée</H1>

        <div>
            <H2>Politique</H2>
            <p>
                Le modèle économique de Pigeon étant participatif (à la manière de Wikipédia) nous n'utilisons pas vos données à but commercial.
            </p>
            <p>
                Nous récoltons le minimum d'informations possible. Nous n'utilisons pas de cookies, excepté le cookie de session.
            </p>
        </div>

        <div>
            <H2>Droits</H2>
            <p>
                Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément
                à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés.
            </p>
            <p>
                En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification, de
                suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit : · via son espace personnel ou en contactant
                le DPO Arthaud Proust : pro@arthaudproust.fr.
            </p>
            <p>
                Le site et le DPO ne sont pas encore déclarés à la CNIL.
            </p>
        </div>

        <div>
            <H2>Données collectées et leur utilisation</H2>

            <H3 class="mt-8">E-mail</H3>
            <H4>Quoi ?</H4>
            <p>
                Votre email est collecté et stocké
            </p>
            <H4>Quand ?</H4>
            <p>
                Lors de votre inscription.
            </p>
            <H4>Pourquoi ?</H4>
            <p>
                Uniquement pour vous connecter et identifier votre compte.
            </p>
            <H4>Quel devenir ?</H4>
            <p>
                Aucune revente, location ou extradition de cette donnée.
            </p>

            <H3 class="mt-8">Nom et prénom</H3>
            <H4>Quoi ?</H4>
            <p>
                Collecte et stockage de votre nom etou prénom.
            </p>
            <H4>Quand ?</H4>
            <p>
                Lors de votre inscription.
            </p>
            <H4>Pourquoi ?</H4>
            <p>
                Uniquement pour votre profil utilisateur.
            </p>
            <H4>Quel devenir ?</H4>
            <p>
                Aucune revente, location ou extradition de cette donnée.
            </p>

            <H3 class="mt-8">Géolocalisation</H3>
            <H4>Quoi ?</H4>
            <p>
                Collecte de votre géolocalisation, pas de stockage (nous stockons le temps de trajet du pigeon).
            </p>
            <H4>Quand ?</H4>
            <p>
                Lorsque vous envoyez votre pigeon récupérer une information.
            </p>
            <H4>Pourquoi ?</H4>
            <p>
                Pour calculer le temps de trajet du pigeon en fonction de la distance entre vous et l'information.
            </p>
            <H4>Quel devenir ?</H4>
            <p>
                Aucune revente, location ou extradition de cette donnée.
            </p>
        </div>
    </InformationsLayout>
</template>
