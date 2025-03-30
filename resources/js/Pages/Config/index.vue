<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CategoryCreate from '@/Pages/Category/Create.vue';
import CategoryEdit from '@/Pages/Category/Edit.vue';
import MakerCreate from '@/Pages/Maker/Create.vue';
import MakerEdit from '@/Pages/Maker/Edit.vue';
import CompanyCreate from '@/Pages/Company/Create.vue';
import CompanyEdit from '@/Pages/Company/Edit.vue';

const props = defineProps({
        categories: Array,
        makers: Array,
        companies: Array,
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
         <div>
            <MakerCreate />
        </div>
        <div>
            <MakerEdit :makers=props.makers />
        </div>
        <div>
            <CompanyCreate />
        </div>
        <div>
            <CompanyEdit :companies=props.companies />
        </div>
    </AuthenticatedLayout>
</template>