<script setup lang="ts">
import PigeonData = App.Data.PigeonData;
import PigeonSentModal from "@/Components/Pigeon/PigeonSentModal.vue";
import {computed, ref} from "vue";
import {router} from "@inertiajs/vue3";
import PigeonNoNewsModal from "@/Components/Pigeon/PigeonNoNewsModal.vue";

const props = defineProps<{
    pigeon: PigeonData
}>();

const emit = defineEmits<{
    click: []
}>()

const pigeonNoNewsModalOpened = ref<boolean>(false);
const pigeonSentModalOpened = ref<boolean>(false);

function handlePerchClick() {
    if (props.pigeon.isTravelling) {
        pigeonSentModalOpened.value = true;
        return
    }

    if (props.pigeon.news.length === 0) {
        pigeonNoNewsModalOpened.value = true;
        return
    }

    router.visit(route('news.show', props.pigeon.news[0]))
}

const newsCount = computed<number>(() => {
    if (props.pigeon.isTravelling) {
        return 0
    }

    return props.pigeon.news.length === 0 ? 0 : 1
})
</script>
<template>
    <div class="relative w-36 h-40 overflow-hidden">
        <img class="absolute w-full bottom-0 -right-2" src="/assets/images/perch-back.png" width="236" height="97" alt="" />
        <div class="absolute bottom-10 left-0 flex items-center justify-center h-10 w-10 bg-pink rounded-full border">
            <span class=" text-button -mb-1">
            {{ newsCount }}
            </span>
        </div>
        <template v-if="!pigeon.isTravelling">
            <img v-if="pigeon.news.length === 0"
                 class="absolute bottom-2.5 right-5 h-32 w-auto"
                 src="/assets/images/pigeon-face.svg"
                 width="240"
                 height="406"
                 alt="" />

            <img v-else
                 class="absolute bottom-2.5 right-5 h-32 w-auto"
                 src="/assets/images/pigeon-face-message.svg"
                 width="240"
                 height="406"
                 alt="" />
        </template>

        <button @click="handlePerchClick" class="absolute top-0 left-0 h-full w-full pointer-events-auto">
            <span class="sr-only">
            {{ pigeon.isTravelling ? 'Voir le perchoir' : 'Voir le pigeon' }}
            </span>
        </button>

        <PigeonSentModal :show="pigeonSentModalOpened" @close="pigeonSentModalOpened=false" />
        <PigeonNoNewsModal :show="pigeonNoNewsModalOpened" @close="pigeonNoNewsModalOpened=false" />
    </div>
</template>
