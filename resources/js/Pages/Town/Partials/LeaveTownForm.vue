<script setup lang="ts">
import {router} from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import {ref} from "vue";
import DangerButton from "@/Components/Primitives/DangerButton.vue";

const confirmingLeave = ref<boolean>(false);

const confirmLeave = () => {
    confirmingLeave.value = true;
};

const leave = () => {
    router.post(route('town.leave'));
};

const closeModal = () => {
    confirmingLeave.value = false;
};
</script>
<template>
    <section>
        <DangerButton @click="confirmLeave">Quitter le village</DangerButton>

        <Modal :show="confirmingLeave" @close="closeModal">
            <template #header>
                Quitter le village ?
            </template>

            <p>Vous pourrez toujours revenir avec le lien d'invitation, s'il reste de la place.</p>

            <div class="mt-6 space-y-2">
                <QuaternaryButton
                    class="text-red"
                    type="button" @click="leave"
                >
                    Quitter le village
                </QuaternaryButton>

                <QuaternaryButton type="button" @click="closeModal">
                    Annuler
                </QuaternaryButton>
            </div>
        </Modal>
    </section>
</template>
