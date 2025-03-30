<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import { Head, Link, useForm } from '@inertiajs/vue3';

    const form = useForm({});

    defineProps({
        history: Object,
    });


    const deleteHistory = (id) => {
        form.delete(route("history.destroy", id));
    };

    const daystring = (date) => {
        let datestamp = new Date(date)
        let year = datestamp.getFullYear();
        let month = (datestamp.getMonth() + 1);
        let day = datestamp.getDate();
        return year + '年' + month  + '月' + day + '日'
};
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Histrory" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                履歴情報
            </h2>
        </template>
        
        <div class="bg-white mx-6 my-6 px-40 py-6">
            <div>
                <div class="text-2xl">
                   {{ history.title }}
                </div>
            </div>
            <div class="mt-4 float-right">
                <div>
                    登録日  {{ daystring(history.created_at) }}
                </div>
                <div v-if="history.updated_at !== history.created_at">
                    更新日　{{ daystring(history.updated_at) }}
                </div>
            </div>
            <div class="mt-12">
                {{ history.detail }}
            </div>
             <div class="mt-4 flex flex-row gap-4">
                <Link :href="route('history.edit', history.id)">
                    <PrimaryButton type="button">更新</PrimaryButton>
                </Link>
                <PrimaryButton type="button"@click="deleteHistory(history.id)">
                    削除
                </PrimaryButton>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
