<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BlueButton from '@/Components/BlueButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';




const props = defineProps({
       appliance: Object,
});

const form = useForm({
    appliance_id: props.appliance.id,
    record_date: "",
    title: "",
    note: "",
});

    const createRecord = () => {
        form.post(route("record.store"));
        console.log(form)
    };

    /*const clickEvent = () => {
      context.emit('from-child');
    };*/
</script>

<template>
    <div class="bg-white mx-6 my-6 px-36 py-6 w-full">
        <form @submit.prevent="createRecord">
            <div>
                {{ appliance.name }}（{{ appliance.item_number }}）の情報登録
            </div>
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
            <div class="mt-8 flex flex-row gap-4">
                <PrimaryButton>
                    登録
                </PrimaryButton>
                <BlueButton @click="$emit('clickEvent')">
                    閉じる
                </BlueButton>
            </div>
        </form>
    </div>
</template>