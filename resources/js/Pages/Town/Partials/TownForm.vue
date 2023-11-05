<script setup lang="ts">
import {useForm, usePage} from "@inertiajs/vue3";
import PrimaryButton from '@/Components/Primitives/PrimaryButton.vue';

const user = usePage().props.auth.user;

const form = useForm({});

function handleSubmit() {
    form.post(route('town.store'));
}

</script>

<template>
    <form @submit.prevent="handleSubmit" class="relative z-0 space-y-6">
        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">Créer mon village</PrimaryButton>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Village créé.</p>
            </Transition>
        </div>

        <p>ou rejoignez-un village en demandant le lien d'invitation à un de ses membres.</p>
    </form>
</template>
