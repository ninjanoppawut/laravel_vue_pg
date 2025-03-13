<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
const props = defineProps({
    test: {
        type: Object,
    },
});
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'TestEdit',
        href: '/test/edit',
    },
];

const form = useForm({
    id: 0,
    name: '',
});
form.id = props?.test?.id;
form.name = props?.test?.name;
const update = () => {
    form.put(route('test.update', form.id));
    console.log(form);
};
</script>

<template>
    <Head title="Test Edit Form" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <form @submit.prevent="update">
            <div class="w-2xl mx-auto mt-8 rounded-md bg-white p-6 shadow-lg">
                <h2 class="mb-4 text-xl font-bold">Card</h2>
                <div class="mb-4 flex items-center gap-2">
                    <form @submit.prevent="update">
                        <div class="flex">
                            <input v-model="form.name" type="text" placeholder="Enter name" class="w-full rounded border px-3 py-2" />
                            <button class="p-2" type="submit" @click="update">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
