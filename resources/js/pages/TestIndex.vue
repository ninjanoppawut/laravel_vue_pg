<script setup="">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    tests: Array,
});
const showEditForm = ref(false);
const selectedEditId = ref(0);
const form = useForm({
    id: 0,
    name: '',
});

const deleteData = (id) => {
    router.delete(route('test.destroy', id));
};
const onOpenEditForm = (id) => {
    // for ui
    selectedEditId.value = id;
    showEditForm.value = true;
    // for update form
    const matchedObject = props.tests.find((test) => test.id === id);
    form.name = matchedObject.name;
    form.id = selectedEditId;
};
const update = () => {
    form.put(route('test.update', form.id));
    onCloseEditForm();
};
const onCloseEditForm = () => {
    showEditForm.value = false;
};
</script>

<template>
    <Head :title="''" />
    <AppLayout>
        <div class="flex justify-between">
            <div>TESTS</div>
            <div>
                <Link as="button" class="rounded bg-blue-500 px-4 py-2 text-white" :href="route('test.create')"> Add new </Link>
            </div>
        </div>

        <div v-for="(test, index) in tests" :key="index" class="mt-2 flex w-full items-center justify-between rounded bg-gray-100 p-3">
            <div v-if="showEditForm && selectedEditId === test.id" class="flex items-center">
                <form @submit.prevent="update">
                    <div class="flex w-full justify-between">
                        <input v-model="form.name" class="w-full rounded border px-3 py-2" />
                        <!-- <Link as="button" class="rounded bg-blue-500 px-4 py-2 text-white" :href="route('test.edit', test.id)"> Edit </Link> -->
                        <button class="p-2" type="submit">Confirm</button>
                        <button class="p-2" type="button" @click="onCloseEditForm">Cancel</button>
                    </div>
                </form>
            </div>
            <div v-else class="flex justify-between">
                <div class="min-w-[700px]">{{ test.name }}</div>
                <div class="flex gap-2">
                    <!-- <Link as="button" class="rounded bg-blue-500 px-4 py-2 text-white" :href="route('test.edit', test.id)"> Edit </Link> -->
                    <button @click="onOpenEditForm(test.id)">Edit</button>
                    <button @click="deleteData(test.id)">Delete</button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
