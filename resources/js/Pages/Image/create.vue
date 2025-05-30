<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BlueButton from '@/Components/BlueButton.vue';
import GreenButton from '@/Components/GreenButton.vue';
import { useForm, router } from '@inertiajs/vue3';
import { ref,computed } from 'vue';

const filename = computed(() => form.image_file ? form.image_file.name: `画像ファイルをアップロードしてください` );


let isEnter = ref(false);

let url = ref("");

const props = defineProps({
       appliance: Object,
});

const emit = defineEmits(['from_child']); 
const form = useForm({
    appliance_id: props.appliance.id,
    image_file: null,
});

const previewImage = (image) => {
    url = URL.createObjectURL(image)
    console.log(url)
}
const dragEnter = () => {
    isEnter = true;
}
const dragLeave = () => {
    isEnter = false;
}

const delateFile = () => {
    form.image_file = null;
     url = "";
    isEnter = false;
}
const dropFile = (event) => {
    
    form.image_file = event.dataTransfer.files[0]
    previewImage(form.image_file)
    console.log(form)
}
    const createImage = () => {
        form.post(route("image.store"));
        clickEvent();
        console.log(form)
    };

    const clickEvent = () => {
        delateFile();
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
        width: 300px;
        height: 200px;
        border: 5px solid gray;
        border-radius: 15px;
    }

    .enter {
        border: 10px solid powderblue;
    }
</style>
<template>
    <div class="bg-white mx-6 my-6 px-24 py-6 w-2/3">
        <div class="text-2xl">
            {{ appliance.name }}（{{ appliance.item_number }}）の画像登録
        </div>
        <div class="flex justify-center">
        <form @submit.prevent="createImage" enctype="multipart/form-data">
            <div v-show="isEnter" class="mt-4">
                <img :src="url" width="20%" height="20%" />
            </div>
            <div class="drop_area" @dragenter="dragEnter" @dragleave="dragLeave" @dragover.prevent @drop.prevent="dropFile" :class="{enter: isEnter}">
                {{ filename }}
            </div>
            <div class="mt-8">
                <PrimaryButton>
                    登録
                </PrimaryButton>
            </div>
        </form>
        </div>
        <div class="mt-2 flex flex-row gap-4">
            <GreenButton  v-on:click="delateFile">
                消去
            </GreenButton>
            <BlueButton v-on:click="clickEvent">
                閉じる
            </BlueButton>
        </div>
    </div>
</template>