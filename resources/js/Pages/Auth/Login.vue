<script setup lang="ts">
import Checkbox from '@/Components/Form/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head>
            <title>Se connecter</title>
        </Head>

        <img src="/assets/images/auth-bg.png" alt="" class="absolute top-0 left-0 w-full -z-10" />

        <div class="grid grid-cols-6 gap-5">
            <h1 class="col-span-full text-blue">Heureux de te retrouver :)</h1>

            <div v-if="status" class="col-span-full">
                {{ status }}
            </div>

            <form class="col-span-full" @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="E-mail" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Mot de passe" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="inline-block mt-2 text-meta-link"
                    >
                        Mot de passe oublié ?
                    </Link>

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-8">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ml-2">Se souvenir de moi</span>
                    </label>
                </div>

                <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Me connecter
                </PrimaryButton>
            </form>

            <div class="col-span-full text-center">
                <Link class="text-meta-link" :href="route('register')">
                    Pas encore pigeon ?<br>
                    Inscris-toi !
                </Link>
            </div>

            <img class="absolute bottom-0 left-1/2 w-1/2 -translate-x-1/2" src="/assets/images/pigeon-face-cut-up.svg" alt="" />
        </div>

    </GuestLayout>
</template>
