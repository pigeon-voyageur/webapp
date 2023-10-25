<script setup lang="ts">
import {Listbox, ListboxButton, ListboxOption, ListboxOptions} from '@headlessui/vue';
import {ChevronDownIcon} from '@heroicons/vue/24/outline';

import {computed} from "vue";

type SelectLine = {
    label: string,
    value: any,
    unavailable?: boolean,
}

const props = defineProps<{
    'lines': SelectLine[]
    'modelValue': any
}>();

const emit = defineEmits<{
    'update:modelValue': [value: any]
}>()

const selectedLine = computed(() => props.lines.find((line) => line.value === props.modelValue))

</script>
<template>
    <Listbox as="div" class="relative" :model-value="modelValue" @update:modelValue="(value)=>emit('update:modelValue', value)">
        <ListboxButton class="relative input-field text-left">
            <span class="text-meta">{{ selectedLine.label }}</span>
            <ChevronDownIcon class="absolute right-2 top-1/2 -translate-y-1/2 h-6 ui-open:rotate-180 transition-transform duration-200" />
        </ListboxButton>
        <transition
            leave-active-class="transition duration-100 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <ListboxOptions class="absolute mt-1 max-h-60 w-full overflow-auto bg-white border shadow-lg">
                <ListboxOption
                    v-for="line in lines"
                    :key="line.value"
                    :value="line.value"
                    :disabled="line.unavailable"
                    class="px-2 py-1 text-meta ui-active:bg-beige ui-selected:font-bold"
                >
                    {{ line.label }}
                </ListboxOption>
            </ListboxOptions>
        </transition>
    </Listbox>
</template>
