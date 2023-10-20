<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {computed, ref} from "vue";

const step = ref<1 | 2>(1);
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const canGoStep2 = computed(() => form.name && form.email)

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head>
            <title>M'inscrire</title>
        </Head>

        <img src="/assets/images/auth-bg.png" alt="" class="absolute top-0 left-0 w-full -z-10" />

        <div class="grid grid-cols-6 gap-5">
            <template v-if="step===1">
                <h1 class="col-span-full text-blue">Salut toi...</h1>

                <p class="col-span-full">Tu veux des infos à vol d’oiseau ? Rejoins-nous ! </p>
            </template>

            <template v-else-if="step===2">
                <button class="col-span-full text-blue text-left" type="button" @click="step=1">Retour à l'étape 1</button>
            </template>

            <h2 class="col-span-full text-center mt-4">Étape {{ step }}/2</h2>

            <form class="col-span-full" @submit.prevent="submit">
                <div v-show="step===1">
                    <div>
                        <InputLabel for="name" value="Nom" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            placeholder="Ex: Jean Dujardin"
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="E-mail" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            placeholder="Ex: jean.dujardin@email.com"
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <PrimaryButton :disabled="!canGoStep2" class="mt-8" type="button" @click="step=2">
                        Suivant
                    </PrimaryButton>
                </div>

                <div v-show="step===2">
                    <div>
                        <InputLabel for="password" value="Mot de passe" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password_confirmation" value="Confirmer le mot de passe" />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <p class="text-meta mt-8">
                        En vous inscrivant vous acceptez nos
                        <a href="/#" target="_blank" class="text-meta-link">Conditions générales d’utilisation</a>
                    </p>

                    <PrimaryButton class="mt-8" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        M'inscrire
                    </PrimaryButton>
                </div>
            </form>

            <template v-if="step===1">
                <div class="col-span-full text-center">
                    <Link class="text-meta-link" :href="route('login')">
                        Déjà pigeon ?<br>
                        Connecte-toi !
                    </Link>
                </div>

                <img class="absolute -z-10 bottom-0 left-1/2 w-1/2 -translate-x-1/2" src="/assets/images/pigeon-face-cut-up.svg" alt="" />
            </template>

            <template v-else-if="step===2">
                <img class="absolute -z-10 bottom-0 right-0" src="/assets/images/pigeon-detective.svg" alt="" />
            </template>
        </div>
    </GuestLayout>
</template>
