<script setup lang="ts">
import TextInput from "@/Components/Form/TextInput.vue";
import TertiaryButton from "@/Components/Primitives/TertiaryButton.vue";
import SecondaryButton from "@/Components/Primitives/SecondaryButton.vue";

const props = defineProps<{
    modelValue: Array<string>;
    placeholder?: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: Array<string>]
}>();

function handleInput(lineIndex: number, lineValue: string) {
    const newModelValue = [...props.modelValue];
    newModelValue[lineIndex] = lineValue;

    emit('update:modelValue', newModelValue)
}

function handleNewLine() {
    const newModelValue = [...props.modelValue];
    newModelValue.push('');

    emit('update:modelValue', newModelValue)
}

function handleDeleteLine(index: number) {
    const newModelValue = [...props.modelValue];
    newModelValue.splice(index, 1);

    emit('update:modelValue', newModelValue)
}
</script>

<template>
    <div>
        <ul class="mb-2 flex flex-col gap-2">
            <li class="flex gap-2" v-for="(str, index) in modelValue" :key="index">
                <TextInput class="w-full" :model-value="str" @update:modelValue="(value)=>handleInput(index, value)" :placeholder="placeholder" />
                <TertiaryButton type="button" class="w-11 shrink-0" @click="handleDeleteLine(index)">X</TertiaryButton>
            </li>
        </ul>

        <SecondaryButton type="button" @click="handleNewLine">Ajouter une ligne</SecondaryButton>
    </div>
</template>
