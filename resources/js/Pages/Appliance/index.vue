<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
const props = defineProps({
       appliances: Array,
});

</script>

<template>
    <AuthenticatedLayout>
        <Head title="Appliance" />
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    家電一覧
                </h2>
                <a :href="route('appliance.create')">
                    新規登録
                </a>
            </template>
            <div  class="bg-white mx-8 my-8 p-6">
                <table class="border-collapse border border-slate-500 w-full">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 py-2">品名</th>
                            <th class="border border-slate-600">カテゴリー</th>
                            <th class="border border-slate-600 w-1/8">品番</th>
                            <th class="border border-slate-600 w-1/8">製造番号</th>
                            <th class="border border-slate-600 w-1/8">製造年</th>
                            <th class="border border-slate-600 w-1/8">メーカー</th>
                            <th class="border border-slate-600 w-1/8">メーカーURL</th>
                            <th class="border border-slate-600 w-1/8">購入日</th>
                            <th class="border border-slate-600 w-1/8">購入店</th>
                            <th class="border border-slate-600 w-1/8">現状</th>
                            <th class="border border-slate-600 w-1/8">廃棄日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appliance in appliances">
                            <td class="border border-slate-700 px-4 py-2 text-blue-700">
                                <Link :href="route('appliance.show', appliance.id)">
                                    {{ appliance.name }}
                                </LinK>
                            </td>
                            <td class="border border-slate-700 px-4 py-2">{{ appliance.category }}</td>
                            <td class="border border-slate-700 px-4 py-2">{{ appliance.item_number }}</td>
                            <td class="border border-slate-700 px-4 py-2">{{ appliance.serial_number }}</td>
                            <td class="border border-slate-700 sticky text-center">{{ appliance.manufacture_year }}</td>
                            <td class="border border-slate-700 px-4 py-2">{{ appliance.maker_name }}</td>
                            <td v-if="appliance.maker_url!==null" class="border border-slate-700 sticky text-center text-blue-700">
                                <a :href = "appliance.maker_url" class="hover:border border-b-blue-700">
                                    登録済
                                </a>
                            </td>
                            <td v-else class="border border-slate-700 sticky text-center">
                                未登録
                            </td>
                            <td class="border border-slate-700 sticky text-center">{{ appliance.purchase_date }}</td>
                            <td v-if="appliance.shop_url!==null" class="border border-slate-700 sticky text-center text-blue-700">
                                <a :href = "appliance.shop_url" class="hover:border border-b-blue-700">
                                    {{ appliance.shop_name }}
                                </a>
                            </td>
                            <td v-else class="border border-slate-700 sticky text-center">
                                {{ appliance.shop_name }}
                            </td>
                            <td class="border border-slate-700 sticky text-center">{{ appliance.status }}</td>
                            <td class="border border-slate-700 sticky text-center">{{ appliance.disposal_date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </AuthenticatedLayout>
</template>