
<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import { useForm } from '@inertiajs/vue3';

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
            <div class="bg-white mx-6 my-6 px-12 py-6">
                <div v-for="history in histories" :key=history.id>
                    <div class="flex flex-col p-2">
                        <div class="flex flex-row gap-24">
                            <div>{{ todaystring(history.created_at) }}</div>
                            <div>
                                <a :href="route('history.show', history.id)" class="text-blue-600">
                                     {{ history.title }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>