<script>
//import InputLabel from "@/Components/InputLabel.vue";
//import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: "",
});
</script>

<template>
    <div class="bg-white mx-6 my-6 px-36 py-6">
           カテゴリー登録
        <p>カテゴリー名</p>
        <input type="text" >
    </div>
</template>