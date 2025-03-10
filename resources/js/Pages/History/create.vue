<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: "",
    detail: "",
});

    const createHistory = () => {
        form.post(route("history.store"));
        console.log(form.title);
        console.log(form.detail);
    };
</script>

<template>
    <Head title="Histrory" />

    <AuthenticatedLayout>
        
            <template #header>
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800"
                >
                    履歴登録
                </h2>
            </template>
        <GuestLayout>
            <form @submit.prevent="createHistory">
            <div>
                <InputLabel for="title" value="タイトル" />

                <TextInput 
                    id="title" 
                    type="text"
                     v-model="form.title"
                />
                
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="detail" value="内容" />
                <textarea v-model="form.detail"></textarea>
            </div>
            <div>
                <PrimaryButton> 登録 </PrimaryButton>
            </div>
            </form>
        </GuestLayout>
        
    </AuthenticatedLayout>
</template>