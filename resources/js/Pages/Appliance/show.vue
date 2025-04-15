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
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">カテゴリー</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.category }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">品番</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.item_number }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">製造番号</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.serial_number }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">製造年</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.manufacture_year }}年</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">メーカー</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.maker_name }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">購入日</td>
                        <td class="border border-slate-700 px-5 py-1">{{ daystring(appliance.purchase_date) }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">購入店</td>
                        <td  v-if="appliance.shop_url!==null" class="border border-slate-700 px-5 py-1">
                            <a :href = "appliance.shop_url" class="hover:border border-b-blue-700">
                                {{ appliance.shop_name }}
                            </a>
                        </td>
                        <td v-else class="border border-slate-700 px-5 py-1">
                            {{ appliance.shop_name }}
                        </td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">現状</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.status }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
