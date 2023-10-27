<script setup lang="ts">
import DangerButton from '@/Components/Primitives/DangerButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import {usePage} from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import {router} from '@inertiajs/vue3';
import NewsData = App.Data.NewsData;


const props = defineProps<{
    news: NewsData;
}>();


const confirmingNewsDeletion = ref(false);

const user = usePage().props.auth.user;

const confirmNewsDeletion = () => {
    confirmingNewsDeletion.value = true;
};

const deleteNews = () => {
    router.delete(route('news.destroy', props.news.id));
};

const closeModal = () => {
    confirmingNewsDeletion.value = false;
};
</script>

<template>
    <section>
        <DangerButton @click="confirmNewsDeletion">Supprimer cette information</DangerButton>

        <Modal :show="confirmingNewsDeletion" @close="closeModal">
            <template #header>
                Es-tu sûr de vouloir supprimer cette information ?
            </template>

            <form @submit.prevent="deleteNews">

                <div class="mt-6 space-y-2">
                    <QuaternaryButton
                        class="text-red"
                    >
                        Oui, supprimer cette information
                    </QuaternaryButton>

                    <QuaternaryButton type="button" @click="closeModal">
                        Non, annuler
                    </QuaternaryButton>
                </div>
            </form>
        </Modal>
    </section>
</template>
