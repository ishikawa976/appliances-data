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
    name: "",
});

    const createShop = () => {
        form.post(route("shop.store"));
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
        </template>
        <div class="bg-white mx-6 my-6 px-36 py-6">
            <form @submit.prevent="createShop">
                <div class="grid grid-cols-2 gap-4 w-full">
                    <div>
                        <InputLabel for="company" value="会社" />
                        <select v-model="form.id" class="w-full">
                            <option v-for="company in companies" :value = "company.id">{{ company.name }}</option>
                        </select>
                    </div>
                    <div>
                        <InputLabel for="shop_name" value="店舗名" />
                        <TextInput 
                            id="shop_name" 
                            type="text"
                            v-model="form.title"
                            class="w-full"
                        />
                    </div>
                    <div class="col-span-2">
                        <InputLabel for="url" value="店舗URL" />
                        <TextInput 
                            id="url" 
                            type="text"
                            v-model="form.title"
                            class="w-full"
                        />
                    </div>
                    <div></div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>