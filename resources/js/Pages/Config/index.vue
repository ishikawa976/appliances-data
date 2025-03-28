<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CategoryCreate from '@/Pages/Category/Create.vue';
import CategoryEdit from '@/Pages/Category/Edit.vue';

const props = defineProps({
        categories: Array,
    });

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
        <div>
            <CategoryEdit :categories=props.categories />
        </div>
    </AuthenticatedLayout>
</template>