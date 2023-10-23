<script setup lang="ts">import {Link} from '@inertiajs/vue3';
</script>

<template>
    <section>
        <Link class="text-meta" :href="route('logout')" as="button" method="post">Déconnexion</Link>
    </section>
</template>
