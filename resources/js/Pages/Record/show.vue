<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import DeleteButton from '@/Components/DeleteButton.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';

    const form = useForm({});

    const props = defineProps({
        record: Object,
    });


    const deleteRecord = (id) => {
        form.delete(route("record.destroy", id));
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
                {{ props.record.appliance.name }}（{{ props.record.appliance.item_number}}）
            </h2>
        </template>
        
        <div class="bg-white mx-6 my-6 px-40 py-6">
            <div>
                <div class="text-2xl">
                   {{ record.title }}
                </div>
            </div>
            <div class="mt-4">
                <div>
                    {{ daystring(record.record_date) }}
                </div>
            </div>
            <div class="mt-12">
                {{ record.note }}
            </div>
             <div class="mt-4 flex flex-row gap-4">
                <Link :href="route('record.edit', record.id)">
                    <PrimaryButton type="button">更新</PrimaryButton>
                </Link>
                <DeleteButton type="button"@click="deleteRecord(record.id)">
                    削除
                </DeleteButton>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
