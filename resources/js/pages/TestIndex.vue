<script setup="">
import {Link, Head} from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";

const props = defineProps({
    tests:Array
})

</script>

<template>
    <Head :title="''"/>
    <AppLayout>

        <div class="flex justify-between">
            <div>TESTS</div>
            <div><Link as="button" class="bg-blue-500 text-white px-4 py-2 rounded" :href="route('test.create')">Add new</Link></div>
        </div>
            <div
                v-for="(test, index) in tests"
                :key="index"
                class="p-3 bg-gray-100 rounded flex justify-between items-center"
            >
                <span>{{ test.name }}</span>
            </div>
    </AppLayout>

</template>
