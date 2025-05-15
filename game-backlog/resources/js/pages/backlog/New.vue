<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

import DeleteUser from '@/components/DeleteUser.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { type BreadcrumbItem, type SharedData, type User } from '@/types';

interface Props {
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Add New Game to Backlog',
        href: '/backlog/new',
    },
];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;

const form = useForm({
    name: '',
    completed: 0,
});

const submit = () => {
    form.post(route('backlog.create'), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Add a New Backlog Item" />

        <div class="flex flex-col space-y-6">
            <form @submit.prevent="submit" class="space-y-6">
                <div class="grid gap-2">
                    <Label for="name">Name</Label>
                    <Input id="name" class="mt-1 block w-full" v-model="form.name" required autocomplete="name" placeholder="Game name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="completed">Completed?</Label>
                    <Input
                        id="completed"
                        type="checkbox"
                        class="mt-1 block w-full"
                        v-model="form.completed"
                        required
                        autocomplete="Completed"
                        placeholder="Completed"
                    />
                    <InputError class="mt-2" :message="form.errors.completed" />
                </div>
                <div class="flex items-center gap-4">
                    <Button :disabled="form.processing">Save</Button>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-show="form.recentlySuccessful" class="text-sm text-neutral-600">Saved.</p>
                    </Transition>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
