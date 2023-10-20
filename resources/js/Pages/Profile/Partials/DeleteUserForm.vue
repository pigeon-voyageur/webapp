<script setup lang="ts">
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {useForm} from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';
import H2 from "@/Components/Primitives/H2.vue";
import H3 from "@/Components/Primitives/H3.vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref<HTMLInputElement | null>(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value?.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value?.focus(),
        onFinish: () => {
            form.reset();
        },
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <H2>Supprimer le compte</H2>
        </header>

        <DangerButton @click="confirmUserDeletion" class="text-meta">Supprimer le compte</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="relative p-6">
                <H3>
                    Tu veux déjà voler de tes propres ailes ?
                </H3>

                <div class=" mt-6">
                    <InputLabel for="password" value="Mot de passe" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />

                </div>

                <img class="absolute -z-10 bottom-0 right-0 w-20" src="/assets/images/pigeon-detective-tall.svg" alt="" />
            </div>

            <div class="flex flex-col border-t">
                <button
                    class="text-meta text-red py-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="deleteUser">
                    Oui, supprimer mon compte
                </button>

                <button class="text-meta border-t py-4" @click="closeModal">Non, annuler</button>
            </div>
        </Modal>
    </section>
</template>
