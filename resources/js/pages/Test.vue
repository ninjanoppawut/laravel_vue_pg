<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Test',
        href: '/test',
    },
];

const form = useForm({
    name: '',
});

const save = () => {
    form.post(route('test.store'));
};
</script>

<template>
    <Head title="Test Form" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <form @submit.prevent="save">
            <div class="w-2xl mx-auto mt-8 rounded-md bg-white p-6 shadow-lg">
                <h2 class="mb-4 text-xl font-bold">Card</h2>
                <div class="mb-4 flex items-center gap-2">
                    <input v-model="form.name" type="text" placeholder="Enter name" class="w-full rounded border px-3 py-2" />
                    <button class="rounded bg-blue-500 px-4 py-2 text-white">Add</button>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
