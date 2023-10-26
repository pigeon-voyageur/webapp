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

const hasMessage = computed<boolean>(() => {
    if (!props.pigeon.news.length) {
        return false
    }

    return !props.pigeon.news[0]?.message?.is_read
})

// const secondsLeft = ref(props.pigeon.secondsToArrive);
// let secondsLeftUpdater: number | null = null;
//
// watch(() => props.pigeon, () => {
//     secondsLeft.value = props.pigeon.secondsToArrive;
// })
//
// onMounted(() => {
//     secondsLeftUpdater = setInterval(() => {
//         secondsLeft.value--;
//     }, 1_000);
// })
//
// onUnmounted(() => {
//     if (secondsLeftUpdater) {
//         clearInterval(secondsLeftUpdater);
//     }
// })
//
// const timeLeft = computed(() => {
//     return DateTime.fromISO("2017-05-15T00:00:00")
//         .plus({second: secondsLeft.value > 0 ? secondsLeft.value : 0})
//         .toLocaleString(DateTime.TIME_24_WITH_SECONDS);
// })

</script>
<template>
    <div class="relative flex flex-col items-end gap-1">
        <div class=" w-14 h-14">
            <img v-if="pigeon.isTravelling"
                 class="h-full w-full"
                 src="/assets/images/pigeon-icon-travelling.svg"
                 alt="" />

            <template v-else>
                <template v-if="hasMessage">
                    <img
                        class="h-full w-full"
                        src="/assets/images/pigeon-icon-message.svg"
                        alt="" />

                    <div class="absolute -top-2.5 -right-2.5 flex items-center justify-center h-8 w-8 bg-red rounded-full">
                    <span class="text-button text-white -mb-1">
                        1
                    </span>
                    </div>
                </template>
                <img v-else
                     class="h-full w-full"
                     src="/assets/images/pigeon-icon-no-message.svg"
                     alt="" />
            </template>

        </div>

        <!--        <div class="bg-white px-2 py-0.5 rounded">-->
        <!--            <span class="h-6 text-meta" v-if="pigeon.isTravelling">{{ timeLeft }}</span>-->
        <!--        </div>-->

        <button @click="handlePerchClick" class="absolute top-0 left-0 h-full w-full pointer-events-auto">
            <span class="sr-only">
            {{ pigeon.isTravelling ? 'Voir le pigeon' : (hasMessage ? 'Voir le message' : 'Voir le dernier message') }}
            </span>
        </button>

        <PigeonSentModal :show="pigeonSentModalOpened" @close="pigeonSentModalOpened=false" />
        <PigeonNoNewsModal :show="pigeonNoNewsModalOpened" @close="pigeonNoNewsModalOpened=false" />
    </div>

</template>
