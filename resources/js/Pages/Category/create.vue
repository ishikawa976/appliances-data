<script>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: "",
});

    const createCategory = () => {
        form.post(route("category.store"));
        console.log(form.title);
        console.log(form.detail);
    };
</script>

<template>
    <div class="bg-white mx-6 my-6 px-36 py-6">
        <form @submit.prevent="createHistory">
            カテゴリー登録
            <InputLabel for="title" value="カテゴリー名" />

            <TextInput 
                id="name" 
                type="text"
                v-model="form.title"
                class="w-full"
            />
                
            <InputError class="mt-2" :message="form.errors.name" />
            <div class="mt-8">
                <PrimaryButton> 登録 </PrimaryButton>
            </div>
        </form>
    </div>
</template>