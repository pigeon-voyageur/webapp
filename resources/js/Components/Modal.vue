<script setup lang="ts">
import {Dialog, DialogPanel, TransitionChild, TransitionRoot} from '@headlessui/vue'
import H3 from "@/Components/Primitives/H3.vue";

const props = withDefaults(
    defineProps<{
        show?: boolean;
    }>(),
    {
        show: false
    }
)

const emit = defineEmits(['close']);

</script>
<template>
    <TransitionRoot appear :show="show" as="template">
        <Dialog @close="emit('close')">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="max-w-mobile mx-auto fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-3xl bg-white p-4 md:p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <H3 v-if="$slots.header" class="mt-4 mb-8">
                                <slot name="header"></slot>
                            </H3>
                            <slot></slot>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
