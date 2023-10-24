<script setup lang="ts">
import PigeonData = App.Data.PigeonData;

defineProps<{
    pigeon: PigeonData
}>();

const emit = defineEmits<{
    click: []
}>()
</script>
<template>
    <div class="relative w-36 h-40 overflow-hidden">
        <img class="absolute w-full bottom-0 -right-2" src="/assets/images/perch-back.png" width="236" height="97" alt="" />
        <div class="absolute bottom-10 left-0 flex items-center justify-center h-10 w-10 bg-pink rounded-full border">
            <span class=" text-button -mb-1">
            {{ pigeon.isTravelling ? '0' : '1' }}
            </span>
        </div>
        <img v-if="!pigeon.isTravelling" class="absolute bottom-2.5 right-5 h-32 w-auto" src="/assets/images/pigeon-face.svg" width="240" height="406"
             alt="" />

        <button @click="emit('click')" class="absolute top-0 left-0 h-full w-full pointer-events-auto">
            <span class="sr-only">
            {{ pigeon.isTravelling ? 'Voir le perchoir' : 'Voir le pigeon' }}
            </span>
        </button>
    </div>
</template>
