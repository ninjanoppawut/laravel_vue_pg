<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { ref, reactive, watch, computed, toRaw } from 'vue';
import { router } from '@inertiajs/vue3'; 

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Test',
        href: '/test',
    },
];

const data = reactive({
    name: '',
    cards: [] as string[],
})
const queriedFormData = ref([])
const reFetchFormData = ref(false)
const selectedIndex = ref()
const addCard = () => {
    if(data.name !== '' && data){
        data.cards.push(data.name);
        data.name = ''
    }
}
const removeCard = (index: number) => {
    data.cards.splice(index, 1)
}


async function submitData(index: number) {
    try {
        router.post('/form', { name: data.cards[index] }, {
            onSuccess: () => {
                console.log('Success') 
                reFetchFormData.value = !reFetchFormData.value
            },
            onError: (errors) => {
                console.error('Validation errors:', errors)
            }
        })
    } catch (error: any) {
        console.error('Request failed:', error)
    }
}
async function queryData() {
    try {
        router.get('/form', {}, {
            onSuccess: (page) => {
                let formArr: any = page.props.forms;   
                queriedFormData.value = formArr
                console.log(toRaw(queriedFormData.value))
            },
            onError: (errors) => {
                console.error('Validation errors:', errors);
            }
        });
        
    } catch (error: any) {
        console.error('Request failed:', error);
    }
}
watch(reFetchFormData, (newVal, prevVal) => {
    console.log(`from ${prevVal} to ${newVal}`);
    queryData()
});

</script>

<template>
    <Head title="Test Form" />

    <AppLayout :breadcrumbs="breadcrumbs">
     
        <div class="w-2xl mx-auto p-6 bg-white shadow-lg rounded-md mt-8">
            <h2 class="text-xl font-bold mb-4">Card</h2>

            <div class="flex items-center gap-2 mb-4">
                <input
                    v-model="data.name"
                    type="text"
                    placeholder="Enter name"
                    class="border px-3 py-2 rounded w-full"
                />
                <button
                    @click="addCard"
                    class="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Add
                </button>
            </div>

        
            <div v-if="data.cards.length" class="space-y-3">
                <div
                    v-for="(card, index) in data.cards"
                    :key="index"
                    class="p-3 bg-gray-100 rounded flex justify-between items-center"
                >
                    <span>{{ card }}</span>
                    <div class="flex flex-row gap-2">
                    <button class="text-green-600 hover:text-green-700" @click="submitData(index)">Save</button>
                    <button
                        @click="removeCard(index)"
                        class="text-red-500 hover:text-red-600"
                    >
                        X
                    </button></div>
                </div>
            </div>

            <p v-else class="text-gray-500">No data</p>
        </div>
        <button
                    @click="queryData"
                    class="bg-blue-500 text-white px-4 py-2 rounded mt-6"
                >
                    Query
        </button>
        <div v-if="queriedFormData.length">
        <table>
            <thead>
                <tr>
                <th>Name</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(data, index) in queriedFormData.value" :key="data.id">
                <td>{{ data.name }}</td>
                <td>action</td>
                </tr>
            </tbody>
        </table></div>
    </AppLayout>
</template>