
<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    //import PrimaryButton from "@/Components/PrimaryButton.vue";
    //import { useForm } from '@inertiajs/vue3';

    defineProps({
        histories: Array,
    });

    const todaystring = (date) => {
        let datestamp = new Date(date)
        let year = datestamp.getFullYear();
        let month = (datestamp.getMonth() + 1);
        let day = datestamp.getDate();
    return year + '年' + month  + '月' + day + '日'
};
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                更新履歴一覧
            </h2>
            <a :href="route('history.create')">
                新規登録
            </a>
        </template>
            <div class="bg-white mx-24 my-12 px-12 py-6">
                <table>
                    <thead>
                        <th class="w-2/7"></th>
                        <th class="w-5/7"></th>
                    </thead>
                    <tbody class="m-2 p-2">
                        <tr v-for="history in histories" :key=history.id class="flex gap-6">
                            <td class="py-4">
                                {{ todaystring(history.created_at) }}
                            </td>
                            <td class="py-4">
                                <a :href="route('history.show', history.id)" class="text-blue-600">
                                     {{ history.title }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </AuthenticatedLayout>
</template>