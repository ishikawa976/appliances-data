<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CategoryCreate from '@/Components/Category/CategoryCreate.vue';
</script>

<template>
    <AuthenticatedLayout>
         <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                各種登録
            </h2>
        </template>
        <div class="bg-white mx-6 my-6 px-36 py-6">
            <CategoryCreate />
        </div>
    </AuthenticatedLayout>
</template>