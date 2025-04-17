<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { computed } from "vue";



const props = defineProps({
       appliance: Array,
});

const form = useForm({
    appliance_id: props.appliance.id,
    title: "",
    note: "",
});

    const createRecord = () => {
        form.post(route("record.store"));
        console.log(form)
    };
</script>

<template>
    <div class="bg-white mx-6 my-6 px-36 py-6">
        <form @submit.prevent="createRecord">
            <div>
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
                <PrimaryButton> 登録 </PrimaryButton>
            </div>
        </form>
    </div>
</template>