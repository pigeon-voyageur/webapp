<script setup lang="ts">
import TextInput from "@/Components/Form/TextInput.vue";
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import SecondaryButton from "@/Components/Primitives/SecondaryButton.vue";
import InputLabel from '@/Components/Form/InputLabel.vue';
import { onMounted } from "vue";

type LinkRow = {
    label: string;
    url: string;
}

const props = defineProps<{
    modelValue: Array<LinkRow>;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: Array<LinkRow>]
}>();

function handleInputLabel(lineIndex: number, label: string) {
    const newModelValue = [...props.modelValue];
    newModelValue[lineIndex].label = label;

    emit('update:modelValue', newModelValue)
}

function handleInputUrl(lineIndex: number, url: string) {
    const newModelValue = [...props.modelValue];
    newModelValue[lineIndex].url = url;

    emit('update:modelValue', newModelValue)
}

function handleNewLine() {
    const newModelValue = [...props.modelValue];
    newModelValue.push({ label: '', url: '' });

    emit('update:modelValue', newModelValue)
}

function handleDeleteLine(index: number) {
    const newModelValue = [...props.modelValue];
    newModelValue.splice(index, 1);

    emit('update:modelValue', newModelValue)
}

onMounted(()=>{
    if(props.modelValue.length === 0){
        handleNewLine();
    }
})

</script>

<template>
    <div>
        <div v-if="modelValue.length" class="mb-2 flex flex-col gap-2 ">
            <article class="flex flex-col gap-2 px-2 py-3 mb-1 border relative bg-white"
                v-for="(linkRow, index) in modelValue" :key="index">
                <div class="absolute top-0 right-0 !w-11">
                    <QuaternaryButton class="" type="button" @click="handleDeleteLine(index)">
                        <img src="/assets/images/cross.svg" alt="Croix">
                    </QuaternaryButton>
                </div>
                <div class="flex flex-col">
                    <InputLabel for="linkRow_url" value="Lien" />
                    <TextInput class="w-full" :model-value="linkRow.url"
                        @update:modelValue="(value) => handleInputUrl(index, value)" />
                </div>
                <div class="flex flex-col">
                    <InputLabel for="linkRow_label" value="Label affiché" />
                    <TextInput class="w-full" :model-value="linkRow.label"
                        @update:modelValue="(value) => handleInputLabel(index, value)" />
                </div>
            </article>
        </div>

        <SecondaryButton type="button" @click="handleNewLine">Ajouter un lien</SecondaryButton>
    </div>
</template>
