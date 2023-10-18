<script setup lang="ts">
import ParchmentData = App.Data.ParchmentData;
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextareaInput from "@/Components/TextareaInput.vue";


const props = defineProps<{
    parchment?: ParchmentData;
}>();

const form = useForm({
    title: props.parchment?.title ?? '',
    summary: props.parchment?.summary ?? ''
});

function handleSubmit() {
    if (props.parchment) {
        form.patch(route('parchments.update', props.parchment))
        return;
    }

    form.post(route('parchments.store'));
}

</script>

<template>
    <section>
        <header>
            <template v-if="parchment">
                <h2 class="text-lg font-medium text-gray-900">Modifier un parchemin</h2>

                <p class="mt-1 text-sm text-gray-600">
                    Modifiez une information ou contribuez à son amélioration.
                </p>
            </template>
            <template v-else>
                <h2 class="text-lg font-medium text-gray-900">Publier un parchemin</h2>

                <p class="mt-1 text-sm text-gray-600">
                    Ajoutez une information.
                </p>
            </template>
        </header>

        <form @submit.prevent="handleSubmit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="title" value="Titre" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="summary" value="Résumé" />

                <TextareaInput
                    id="summary"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.summary"
                    required
                />

                <InputError class="mt-2" :message="form.errors.summary" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">{{ parchment ? 'Enregistrer' : 'Publier' }}</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Enregistré.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
