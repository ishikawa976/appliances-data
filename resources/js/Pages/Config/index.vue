<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
//import CategoryCreate from '@/Components/Category/CategoryCreate.vue';
</script>

<template>
    <AuthenticatedLayout>
         <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                各種登録
            </h2>
        </template>
        <div>
            <CategoryCreate />
        </div>
    </AuthenticatedLayout>
</template>