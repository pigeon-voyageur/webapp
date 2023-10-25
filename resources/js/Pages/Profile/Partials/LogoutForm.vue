<script setup lang="ts">import {router} from '@inertiajs/vue3';
import TertiaryButton from "@/Components/Primitives/TertiaryButton.vue";
import Modal from '@/Components/Modal.vue';
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import {ref} from "vue";

const confirmingLogout = ref<boolean>(false);

const confirmLogout = () => {
    confirmingLogout.value = true;
};

const logout = () => {
    router.post(route('logout'));
};

const closeModal = () => {
    confirmingLogout.value = false;
};
</script>
<template>
    <section>
        <TertiaryButton @click="confirmLogout">Déconnexion</TertiaryButton>

        <Modal :show="confirmingLogout" @close="closeModal">
            <template #header>
                Besoin de roucouler dans ton coin ?
            </template>

            <div class="mt-6 space-y-2">
                <QuaternaryButton
                    class="text-red"
                    type="button" @click="logout"
                >
                    Oui, me déconnecter
                </QuaternaryButton>

                <QuaternaryButton type="button" @click="closeModal">
                    Non, annuler
                </QuaternaryButton>
            </div>
        </Modal>
    </section>
</template>
