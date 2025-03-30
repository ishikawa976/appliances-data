<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import DeleteButton from '@/Components/DeleteButton.vue';

const props = defineProps({
       makers: Array,
    });

const form = useForm({ 
    id : "",
    name : "",
});

//const deleteform = useForm({});

const editMaker = () => {
    console.log(form.id)
    console.log(form.name)
    form.put(route("maker.update", form.id));
};

const deleteMaker = (id) => {
        form.delete(route("maker.destroy", id));
    };
</script>

<template><div class="bg-white mx-36 my-6 px-36 py-6">
    
        <form @submit.prevent="editMaker()">
            メーカー編集
            <InputLabel class="mt-8" for="name" value="メーカー名" />
            <select v-model="form.id" class="mt-4 w-full">
                <option v-for="maker in makers" :value = "maker.id">{{ maker.name }}</option>
            </select>
            
            <InputLabel class="mt-8" for="name" value="新しいメーカー名" />
            <TextInput 
                id="name" 
                type="text"
                v-model="form.name"
                class="mt-4 w-full"
            />

            <InputError class="mt-2" :message="form.errors.name" />
            <div class="flex flex-row gap-4">
                <div class="mt-8">
                    <PrimaryButton> 登録 </PrimaryButton>
                </div>
                <div class="mt-8">
                    <DeleteButton type="button"@click="deleteMaker(form.id)">
                        削除
                    </DeleteButton>
                </div>
            </div>
        </form>
    </div>
</template>