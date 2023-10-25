<script setup lang="ts">
import DangerButton from '@/Components/Primitives/DangerButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';
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
            <template #header>
                Tu veux déjà voler de tes propres ailes ?
            </template>

            <form @submit.prevent="deleteUser">
                <input type="text" class="hidden" :value="user.name" name="username" autocomplete="username" />

                <div>
                    <InputLabel for="password" value="Mot de passe" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        @keyup.enter="deleteUser"
                        autocomplete="false"
                    />

                    <InputError :message="form.errors.password" />

                </div>

                <div class="mt-6 space-y-2">
                    <QuaternaryButton
                        class="text-red"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Oui, supprimer mon compte
                    </QuaternaryButton>

                    <QuaternaryButton type="button" @click="closeModal">
                        Non, annuler
                    </QuaternaryButton>
                </div>
            </form>
        </Modal>
    </section>
</template>
