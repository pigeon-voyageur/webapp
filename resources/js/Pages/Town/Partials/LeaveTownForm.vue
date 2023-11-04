<script setup lang="ts">
import {router} from '@inertiajs/vue3';
import TertiaryButton from "@/Components/Primitives/TertiaryButton.vue";
import Modal from '@/Components/Modal.vue';
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import {ref} from "vue";

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
        <TertiaryButton @click="confirmLeave">Quitter le village</TertiaryButton>

        <Modal :show="confirmingLeave" @close="closeModal">
            <template #header>
                Quitter vos amis ?
            </template>

            <div class="mt-6 space-y-2">
                <QuaternaryButton
                    class="text-red"
                    type="button" @click="leave"
                >
                    Oui, laissez-moi seul
                </QuaternaryButton>

                <QuaternaryButton type="button" @click="closeModal">
                    Non, annuler
                </QuaternaryButton>
            </div>
        </Modal>
    </section>
</template>
