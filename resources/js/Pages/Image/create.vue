<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
//import InputLabel from "@/Components/InputLabel.vue";
//import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BlueButton from '@/Components/BlueButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const filename = `画像ファイルをアップロードしてください`

const isEnter = ref(false);

const props = defineProps({
       appliance: Object,
});

const emit = defineEmits(['from_child']); 
const form = useForm({
    appliance_id: props.appliance.id,
    image_file: {},
});

const dragEnter = () => {
    isEnter = true;
}
const dragLeave = () => {
    isEnter = false;
}

const dropFile = () => {
    
    //form.image_file = $event.dataTransfer.files[0]
    //filename = form.image_file.name
    console.log($event.dataTransfer.files)
}
    const createImage = () => {
        form.post(route("image.store"));
        clickEvent();
        console.log(form)
    };

    const clickEvent = () => {
      emit('from_child');
    };
</script>
<style>
    .drop_area {
        color: gray;
        font-weight: bold;
        font-size: 1.2em;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 500px;
        height: 300px;
        border: 5px solid gray;
        border-radius: 15px;
    }
</style>
<template>
    <div class="bg-white mx-6 my-6 px-24 py-6 w-2/3" enctype=”multipart/form-data”>
        <div class="text-2xl">
            {{ appliance.name }}（{{ appliance.item_number }}）の画像登録
        </div>
        <div class="drop_area" @dragenter="dragEnter" @dragleave="dragLeave" @dragover.prevent @drop.prevent="form.image_file=$event.dataTransfer.files[0]" :class="{enter: isEnter}">
            {{ filename }}
        </div>
        <div class="mt-8 flex flex-row gap-12">
            <PrimaryButton v-on:click="createImage">
                登録
            </PrimaryButton>
            <BlueButton v-on:click="clickEvent">
                閉じる
            </BlueButton>
        </div>
    </div>
</template>