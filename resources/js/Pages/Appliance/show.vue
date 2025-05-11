<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import DeleteButton from '@/Components/DeleteButton.vue';
    import BlueButton from '@/Components/BlueButton.vue';
    import RecordCleate from '@/Pages/Record/create.vue';
    import RecordIndex from '@/Pages/Record/index.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const showContent = ref(false);

    const openModal = () => {
        console.log('click');
        showContent.value = true;
      };

      const closeModal = () => {
        showContent.value = false;
      };

    const props = defineProps({
        appliance: Object,
    });


    const deleteAppliance = (id) => {
        form.delete(route("appliance.destroy", id));
    };

    const daystring = (date) => {
        let datestamp = new Date(date)
        let year = datestamp.getFullYear();
        let month = (datestamp.getMonth() + 1);
        let day = datestamp.getDate();
        return year + '年' + month  + '月' + day + '日'
    };

    const recordsLength = props.appliance.records.length;
</script>
<style>
    #overlay{
        /*　要素を重ねた時の順番　*/
        z-index:1;

        /*　画面全体を覆う設定　*/
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);

        /*　画面の中央に要素を表示させる設定　*/
        display: flex;
        align-items: center;
        justify-content: center;

    }
</style>
<template>
    <AuthenticatedLayout>
        <Head title="Appliance" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                家電情報
            </h2>
        </template>
        <div class="bg-white mx-12 my-6 px-40 py-6">
            <div>
                <div class="text-2xl">
                   {{ appliance.name }}
                </div>
            </div>
            <div v-if="appliance.maker_url!==null">
                <a :href = "appliance.maker_url" class="text-blue-700 hover:border border-b-blue-700">
                    メーカーURLの情報
                </a>
            </div>
            <div class="mt-4">
                <table class="border-collapse border border-slate-500 w-full">
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">カテゴリー</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.category }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">品番</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.item_number }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">製造番号</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.serial_number }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">製造年</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.manufacture_year }}年</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">メーカー</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.maker_name }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">購入日</td>
                        <td class="border border-slate-700 px-5 py-1">{{ daystring(appliance.purchase_date) }}</td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">購入店</td>
                        <td  v-if="appliance.shop_url!==null" class="border border-slate-700 px-5 py-1">
                            <a :href = "appliance.shop_url" class="hover:border border-b-blue-700">
                                {{ appliance.shop_name }}
                            </a>
                        </td>
                        <td v-else class="border border-slate-700 px-5 py-1">
                            {{ appliance.shop_name }}
                        </td>
                    </tr>
                    <tr class="px-5">
                        <td class="border border-slate-700 px-5 py-1">現状</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.status }}</td>
                    </tr>
                    <tr v-if="appliance.disposal===true" class="px-5">
                        <td class="border border-slate-700 px-5 py-1">廃棄日</td>
                        <td class="border border-slate-700 px-5 py-1">{{ appliance.disposal_date }}</td>
                    </tr>
                </table>
            </div>
            <div class="mt-8 flex flex-row gap-4">
                <Link :href="route('appliance.edit', appliance.id)">
                    <PrimaryButton type="button">更新</PrimaryButton>
                </Link>
                <DeleteButton type="button"@click="deleteAppliance(appliance.id)">
                    削除
                </DeleteButton>
                <BlueButton v-on:click="openModal">
                    情報登録
                </BlueButton>
            </div>
            <div id="overlay" v-show="showContent">
                <RecordCleate :appliance="props.appliance" v-on:clickEvent="closeModal" />
            </div>
        </div>
        <div v-if="recordsLength !== 0">
            <RecordIndex :records="props.appliance.records" />
        </div>
    </AuthenticatedLayout>
</template>
