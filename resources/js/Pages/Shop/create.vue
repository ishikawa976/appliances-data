<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
       companies: Array,
});

const form = useForm({
    company_id: "",
    shop_name: "",
    url: "",
    status: "",
});

    const createShop = () => {
        form.post(route("shop.store"));
        console.log(form.shop_name)
    };
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Shop" />
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                販売店舗登録
            </h2>
            <a :href="route('shop.index')">
                登録済店舗名一覧
            </a>
        </template>
        <div class="bg-white mx-48 my-6 px-60 py-6">
            <form @submit.prevent="createShop">
                <div class="flex justify-center flex-col gap-4">
                    <div>
                        <InputLabel for="company" value="会社" />
                        <select v-model="form.company_id" class="w-full">
                            <option v-for="company in companies" :value = "company.id">{{ company.name }}</option>
                        </select>
                    </div>
                    <div>
                        <InputLabel for="shop_name" value="店舗名" />
                        <TextInput
                            id="shop_name" 
                            type="text"
                            v-model="form.shop_name"
                             class="w-full"
                        />
                    </div>
                    <div>
                        <InputLabel for="url" value="店舗URL" />
                        <TextInput 
                            id="url" 
                            type="text"
                            v-model="form.url"
                            class="w-full"
                        />
                    </div>
                     <div>
                        <InputLabel for="url" value="現状" />
                        <select v-model="form.status" class="w-1/2">
                            <option></option>
                            <option>営業中</option>
                            <option>閉店</option>
                            <option>未確認</option>
                        </select>
                    </div>
                    <InputError class="mt-2" :message="form.errors.name" />
                    <div class="mt-8">
                        <PrimaryButton> 登録 </PrimaryButton>
                    </div>
               </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>