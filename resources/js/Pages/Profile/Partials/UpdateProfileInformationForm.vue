<script setup lang="ts">
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Primitives/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3';
import H2 from "@/Components/Primitives/H2.vue";


defineProps<{
    mustVerifyEmail?: Boolean;
    status?: String;
}>();

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <H2>Informations</H2>
        </header>

        <form @submit.prevent="form.put(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Nom" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="E-mail" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="mt-2">
                    Vous n'avez pas vérifié votre adresse mail
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="text-left"
                    >
                        Appuyez ici pour renvoyer un mail de confirmation.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2"
                >
                    Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                </div>
            </div>

            <PrimaryButton :disabled="form.processing">Enregistrer</PrimaryButton>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-meta">Enregistré.</p>
            </Transition>
        </form>
    </section>
</template>
