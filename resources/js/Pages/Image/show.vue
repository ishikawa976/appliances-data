<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteButton from '@/Components/DeleteButton.vue';
import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        image: Object,
    });

    const imagePath = "/storage/image/" + props.image.image_title;

    const deleteImage = () => {
        form.delete(route("image.destroy", props.image.id));
    };

</script>
<template>
    <AuthenticatedLayout>
        <Head title="Image" />
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ props.image.appliance.name }}（{{ props.image.appliance.item_number }}）の画像
                </h2>
            </template>
        <div class="bg-white mx-12 my-6 py-12">
            <div class="flex justify-center">
                <img :src=imagePath width="60%" height="60%">
            </div>
            <div class="bg-white mt-12 mx-24 p-4 flex justify-center">
                <DeleteButton v-on:click="deleteImage">
                    削除
                </DeleteButton>
            </div>
        </div>
    </AuthenticatedLayout>
</template>