<script setup lang="ts">
import TextInput from "@/Components/Form/TextInput.vue";
import QuaternaryButton from "@/Components/Primitives/QuaternaryButton.vue";
import InputLabel from '@/Components/Form/InputLabel.vue';
import {onMounted} from "vue";
import TertiaryButton from "@/Components/Primitives/TertiaryButton.vue";
import InputError from "@/Components/Form/InputError.vue";
import {XMarkIcon} from '@heroicons/vue/24/outline';

type LinkRow = {
    label: string;
    url: string;
}

const props = defineProps<{
    id?: string;
    modelValue: Array<LinkRow>;
    errors: { [key: string]: string };
    required?: boolean;
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
    newModelValue.push({label: '', url: ''});

    emit('update:modelValue', newModelValue)
}

function handleDeleteLine(index: number) {
    const newModelValue = [...props.modelValue];
    newModelValue.splice(index, 1);

    emit('update:modelValue', newModelValue)
}

onMounted(() => {
    if (props.modelValue.length === 0 && props.required) {
        handleNewLine();
    }
})


</script>

<template>
    <div>
        <div v-if="modelValue.length" class="flex flex-col gap-2 ">
            <article
                v-for="(linkRow, index) in modelValue"
                :key="index"
                class="flex flex-col gap-2 px-2 py-3 mb-1 border relative bg-white"
            >
                <div v-if="!required || (required && index>0)" class="absolute top-0 right-0 !w-11">
                    <QuaternaryButton class="" type="button" @click="handleDeleteLine(index)">
                        <span class="sr-only">Supprimer le lien</span>
                        <XMarkIcon class="h-8" />
                    </QuaternaryButton>
                </div>

                <div>
                    <InputLabel for="linkRow_url" value="Lien" />

                    <TextInput
                        class="w-full"
                        :model-value="linkRow.url"
                        @update:modelValue="(value) => handleInputUrl(index, value)"
                        placeholder="Ex: https://youtube/..."
                    />

                    <InputError :message="errors[`${id}.${index}.url`] ?? null" />
                </div>

                <div>
                    <InputLabel for="linkRow_label" value="Label affiché" />

                    <TextInput
                        class="w-full"
                        :model-value="linkRow.label"
                        @update:modelValue="(value) => handleInputLabel(index, value)"
                        placeholder="Ex: Vidéo youtube"
                    />
                    <InputError :message="errors[`${id}.${index}.label`] ?? null" />
                </div>
            </article>
        </div>

        <TertiaryButton class="mt-1" type="button" @click="handleNewLine">Ajouter un lien</TertiaryButton>
    </div>
</template>
