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
    <form @submit.prevent="handleSubmit" class="relative z-0 space-y-6 bg-yellow -m-3 p-3 rounded-xl">
        <img src="/assets/images/bg.png" alt="" height="719" width="1000" class="absolute h-full w-full top-0 left-0 -z-10 rounded-xl" />

        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">Créer un village</PrimaryButton>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Village créé.</p>
            </Transition>
        </div>
    </form>
</template>
