<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';




const props = defineProps({
       record: Object,
});

const form = useForm({
    appliance_id: props.record.appliance.id,
    record_date: props.record.record_date,
    title: props.record.title,
    note: props.record.note,
});

    const editRecord = () => {
        form.post(route("record.update"));
        console.log(form)
    };
</script>

<template>
    <AuthenticatedLayout>
    <Head title="Record" />
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ props.record.appliance.name }}（{{ props.record.appliance.item_number}}）
        </h2>
    </template>
   
    <div class="bg-white mx-6 my-6 px-36 py-6">
        <form @submit.prevent="editRecord">
            <div class="mt-8">
                <InputLabel for="record_date" value="日付" />
                <TextInput
                    id="record_date" 
                    type="date"
                    v-model="form.record_date"
                    class="w-1/2"
                />
            </div>
            <div class="mt-8">
                <InputLabel for="title" value="タイトル" />

                <TextInput 
                    id="title" 
                    type="text"
                     v-model="form.title"
                     class="w-full"
                />
                
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-8">
                <InputLabel for="note" value="内容" />
                <textarea v-model="form.note" class="w-full h-40"></textarea>
            </div>
            <div class="mt-8">
                <PrimaryButton> 更新 </PrimaryButton>
            </div>
        </form>
    </div>
    </AuthenticatedLayout>
</template>