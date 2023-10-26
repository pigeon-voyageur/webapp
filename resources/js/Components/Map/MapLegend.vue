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
            <H3 class="mb-4">
                Légende de la carte
            </H3>
            
            <div class="flex flex-col gap-4 mb-1">
            <div class="flex gap-2 items-start">
                <img src="/assets/images/MapPoint_Blue.png" class="w-7">
                <p class="text-meta self-center">Information à aller chercher !</p>
            </div>
            <div class="flex gap-2 items-start ">
                <img src="/assets/images/MapPoint_Checked.png" class="w-7">
                <p class="text-meta self-center">Information déjà recupérée, tu peux la relire à tout moment </p>
            </div>
            <div class="flex gap-2 items-start ">
                <img src="/assets/images/MapPoint_Disabled.png" class="w-7">
                <p class="text-meta self-center">Attends que ton pigeon revienne pour l'envoyer chercher cette information</p>
            </div>
            <div class="flex gap-2 items-start">
                <img src="/assets/images/MapPoint_PinkLosange.png" class="w-7">
                <p class="text-meta self-center">Tu as écrit cette news</p>
            </div>
            </div>

            <div class="flex flex-col gap-2 mt-2">
                <PrimaryButton type="button" @click="emit('close')">
                    J'ai compris !
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>
