<script setup lang="ts">
import TextInput from "@/Components/Form/TextInput.vue";

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
        <ul class="flex flex-col gap-2">
            <li class="flex gap-2" v-for="(str, index) in modelValue" :key="index">
                <TextInput class="w-full" :model-value="str" @update:modelValue="(value)=>handleInput(index, value)" :placeholder="placeholder" />
                <button class="p-2 border h-full" @click="handleDeleteLine(index)">x</button>
            </li>
        </ul>

        <button type="button" @click="handleNewLine">Ajouter</button>
    </div>
</template>
