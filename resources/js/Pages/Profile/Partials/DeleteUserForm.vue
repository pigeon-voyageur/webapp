<script setup lang="ts">
import DangerButton from '@/Components/Primitives/DangerButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';
import H3 from "@/Components/Primitives/H3.vue";
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref<HTMLInputElement | null>(null);

const user = usePage().props.auth.user;

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
    <section>
        <DangerButton @click="confirmUserDeletion">Supprimer mon compte</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <form @submit.prevent="deleteUser">
                <div class="relative p-6">

                    <H3>
                        Tu veux déjà voler de tes propres ailes ?
                    </H3>

                    <input type="text" class="hidden" :value="user.name" name="username" autocomplete="username" />

                    <div class=" mt-6">
                        <InputLabel for="password" value="Mot de passe" />

                        <TextInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            @keyup.enter="deleteUser"
                            autocomplete="false"
                        />

                        <InputError :message="form.errors.password" class="mt-2" />

                    </div>

                    <img class="absolute -z-10 bottom-0 right-0 w-20" src="/assets/images/pigeon-detective-tall.svg" alt="" />
                </div>

                <div class="flex flex-col">
                    <DangerButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Oui, supprimer mon compte
                    </DangerButton>

                    <QuaternaryButton type="button" @click="closeModal">
                        Non, annuler
                    </QuaternaryButton>
                </div>
            </form>
        </Modal>
    </section>
</template>
