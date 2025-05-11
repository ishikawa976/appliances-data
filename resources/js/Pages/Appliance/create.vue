<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { computed } from "vue";

const status = computed(() => form.disposal ? '廃棄済' : '所有' );

const props = defineProps({
       categories: Array,
       makers: Array,
       shops: Array
});

const form = useForm({
    name: "",
    category_id: "",
    item_number: "",
    serial_number: "",
    manufacture_year: "",
    maker_id: "",
    maker_url: "",
    purchase_date: "",
    shop_id: "",
    disposal: false,
    disposal_date: "",
    manual_pdf: "",
});

    const createAppliance = () => {
        form.post(route("appliance.store"));
        console.log(form)
    };
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Appliance" />
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                家電データ登録
            </h2>
        </template>
        <div class="bg-white mx-48 my-6 px-60 py-6">
             <form @submit.prevent="createAppliance" enctype=”multipart/form-data”>
                <div class="flex flex-col gap-8">
                <div>
                    <InputLabel for="name" value="品名" />
                    <TextInput
                        id="name" 
                        type="text"
                        v-model="form.name"
                        class="w-full"
                    />
                </div>
                <div>
                    <InputLabel for="category_id" value="カテゴリー" />
                    <select v-model="form.category_id" class="w-1/2">
                        <option v-for="category in categories" :value = "category.id">{{ category.name }}</option>
                    </select>
                </div>
                <a :href="route('config.index')">
                    カテゴリー登録
                </a>
                <div>
                    <InputLabel for="item_number" value="品番" />
                    <TextInput
                        id="item_number" 
                        type="text"
                        v-model="form.item_number"
                        class="w-full"
                    />
                </div>
                <div>
                    <InputLabel for="serial_number" value="製造番号" />
                    <TextInput
                        id="serial_number" 
                        type="text"
                        v-model="form.serial_number"
                        class="w-full"
                    />
                </div>
                <div>
                    <InputLabel for="manufacture_year" value="製造年" />
                    <TextInput
                        id="manufacture_year" 
                        type="number"
                        v-model="form.manufacture_year"
                        class="w-1/2"
                    />
                </div>
                <div>
                    <InputLabel for="maker_id" value="メーカー" />
                    <select v-model="form.maker_id" class="w-1/2">
                        <option v-for="maker in makers" :value = "maker.id">{{ maker.name }}</option>
                    </select>
                </div>
                <div>
                    <InputLabel for="maker_url" value="メーカーURL" />
                    <TextInput
                        id="maker_url" 
                        type="text"
                        v-model="form.maker_url"
                        class="w-full"
                    />
                </div>
                <div class="grid grid-cols-2 gap-4 w-full">
                <div>
                    <InputLabel for="purchase_date" value="購入日" />
                    <TextInput
                        id="purchase_date" 
                        type="date"
                        v-model="form.purchase_date"
                        class="w-full"
                    />
                </div>
                <div>
                    <InputLabel for="shop_id" value="購入店舗" />
                    <select v-model="form.shop_id" class="w-full">
                        <option v-for="shop in shops" :value = "shop.id">{{ shop.full_name }}</option>
                    </select>
                </div>
                </div>
                <div class="grid grid-cols-2 gap-4 w-full">
                <div>
                    <InputLabel for="disposal" value="廃棄" />
                    <label>
                    <input
                        v-model="form.disposal"
                        type="checkbox"
                        class="peer sr-only"
                    />
                    <span
                        class="block w-[2em] cursor-pointer bg-gray-500 rounded-full
                        p-[1px] after:block after:h-[1em] after:w-[1em] after:rounded-full
                        after:bg-white after:transition peer-checked:bg-blue-500
                        peer-checked:after:translate-x-[calc(100%-2px)]"
                    >
                    </span>
                         {{ status }}
                    </label>
                </div>
                <div>
                    <InputLabel for="disposal_date" value="廃棄日" />
                    <TextInput
                        id="disposal_date" 
                        type="date"
                        v-model="form.disposal_date"
                        class="w-full"
                    />
                </div>
                </div>
                <div>
                    <InputLabel for="manual_pdf" value="取扱説明書" />
                    <input type="file" id="manual_pdf" @input="form.manual_pdf=$event.target.file[0]">
                </div>
                <div class="mt-8">
                    <PrimaryButton> 登録 </PrimaryButton>
                </div>
                </div>
             </form>
        </div>
    </AuthenticatedLayout>
</template>