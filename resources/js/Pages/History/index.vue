
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
        </template>
        <div class="flex justify-center">
            <div class="bg-white mt-6 p-4 flex justify-center">
                <div v-for="history in histories" :key=history.id>
                    <div class="flex flex-row gap-4">
                        <div>{{ todaystring(history.created_at) }}</div>
                        <div>
                            <a href="{{route('history.show', $post)}}" class="text-blue-600">
                             {{ history.title }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>