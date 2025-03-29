<script setup>
import InputLabel from "@/Components/InputLabel.vue";
//import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
        categories: Array,
    });

const form = useForm({ 
    id : "",
    name : "",
});

    const editCategory = () => {
        console.log(form.id)
        console.log(form.name)
        form.put(route("category.update", form.id));
    };

</script>

<template><div class="bg-white mx-12 my-6 px-36 py-6">
    
        <form @submit.prevent="editCategory()">
            カテゴリー編集
            <InputLabel class="mt-8" for="name" value="カテゴリー名" />
            <select v-model="form.id" class="mt-4 w-full">
                <option v-for="category in categories" :value = "category.id">{{ category.name }}</option>
            </select>
            
            <InputLabel class="mt-8" for="name" value="新しいカテゴリー名" />
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