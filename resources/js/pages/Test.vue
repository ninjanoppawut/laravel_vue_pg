<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import {type BreadcrumbItem} from '@/types';
import {Head, useForm} from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Test',
        href: '/test',
    },
];

const form = useForm({
    name: ''
})


const save = () => {
    form.post(route('test.store'))
}

</script>

<template>
    <Head title="Test Form"/>

    <AppLayout :breadcrumbs="breadcrumbs">
        <form @submit.prevent="save">
            <div class="w-2xl mx-auto p-6 bg-white shadow-lg rounded-md mt-8">
                <h2 class="text-xl font-bold mb-4">Card</h2>
                <div class="flex items-center gap-2 mb-4">
                    <input
                        v-model="form.name"
                        type="text"
                        placeholder="Enter name"
                        class="border px-3 py-2 rounded w-full"
                    />
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded"
                    >
                        Add
                    </button>
                </div>

            </div>
        </form>
    </AppLayout>
</template>
