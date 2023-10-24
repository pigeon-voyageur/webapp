<script setup lang="ts">
import Modal from '@/Components/Modal.vue';
import PrimaryButton from "@/Components/Primitives/PrimaryButton.vue";
import H3 from "@/Components/Primitives/H3.vue";

defineProps<{
    show: boolean
}>()

const emit = defineEmits<{
    close: []
}>()
</script>

<template>
    <Modal :show="show" @close="emit('close')">
        <div class="p-6 space-y-2">
            <H3>
                Je n'ai pas encore récupéré d'information !
            </H3>

            <p>
                Cliquez sur un point de la carte du monde pour m'envoyer chercher une information.
            </p>

            <div class="flex flex-col gap-2">
                <PrimaryButton type="button" @click="emit('close')">
                    Ok, j'y vais !
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>
