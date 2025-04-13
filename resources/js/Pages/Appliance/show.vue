<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import { Head, Link, useForm } from '@inertiajs/vue3';


    defineProps({
        appliance: Object,
    });


    const deleteAppliance = (id) => {
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
                家電情報
            </h2>
        </template>
        <div class="bg-white mx-6 my-6 px-40 py-6">
            <div>
                <div class="text-2xl">
                   {{ appliance.name }}
                </div>
            </div>
            <div>
                <table class="border-collapse border border-slate-500 w-full">
                    
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
