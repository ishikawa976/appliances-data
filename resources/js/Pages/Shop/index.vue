<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DeleteButton from '@/Components/DeleteButton.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';

const form = useForm({});

const props = defineProps({
       shops: Array,
});

const deleteShop = (id) => {
    form.delete(route("shop.destroy", id), {
        preserveScroll: true,
    });
};
</script>

<template>
     <AuthenticatedLayout>
       <Head title="Shop" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                登録済店舗名一覧
            </h2>
        </template>
        <div class="bg-white mx-16 my-16 p-6">
            <div>
                <table class="border-collapse border border-slate-500">
                    <thead>
                        <tr>
                            <th class="border border-slate-600">店舗名</th>
                            <th class="border border-slate-600">状況</th>
                            <th class="border border-slate-600">店舗URL</th>
                            <th class="border border-slate-600">編集ボタン</th>
                            <th class="border border-slate-600">削除ボタン</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="shop in shops">
                            <td class="border border-slate-700">{{ shop.full_name }}</td>
                            <td class="border border-slate-700">{{ shop.status }}</td>
                            <td v-if="shop.url!==null" class="border border-slate-700">
                                <a :href = "shop.url">
                                    登録済
                                </a>
                            </td>
                            <td v-else class="border border-slate-700">
                                未登録
                            </td>
                            <td class="border border-slate-700">
                                <Link :href="route('shop.edit', shop.id)">
                                    <PrimaryButton type="button">
                                        編集
                                    </PrimaryButton>
                                </Link>
                            </td>
                            <td class="border border-slate-700">
                                <DeleteButton
                                    type="button"
                                    @click="deleteShop(shop.id)"
                                >
                                    削除
                                </DeleteButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>