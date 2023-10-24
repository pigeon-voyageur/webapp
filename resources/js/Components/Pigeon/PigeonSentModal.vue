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
                Ton pigeon est parti
            </H3>

            <p>
                Il revient dans quelque temps avec l'information que tu lui as demandé, en attendant tu peux retourner à tes
                occupations.
            </p>

            <div class="flex flex-col gap-2">
                <PrimaryButton type="button" @click="emit('close')">
                    Ok, merci !
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>
