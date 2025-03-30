<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: "",
});

    const createCompany = () => {
        form.post(route("company.store"));
        form.name=""
    };
</script>

<template>
    <div class="bg-white mx-36 my-6 px-36 py-6">
        <form @submit.prevent="createCompany">
            販売会社登録
            <InputLabel class="mt-8" for="name" value=" 販売会社名" />

            <TextInput 
                id="name" 
                type="text"
                v-model="form.name"
                class="mt-4 w-full"
            />

            <InputError class="mt-2" :message="form.errors.name" />
            <div class="mt-8">
                <PrimaryButton> 登録 </PrimaryButton>
            </div>
        </form>
    </div>
</template>