<script setup>
    defineProps({
        records: Array,
    });

     const todaystring = (date) => {
        let datestamp = new Date(date)
        let year = datestamp.getFullYear();
        let month = (datestamp.getMonth() + 1);
        let day = datestamp.getDate();
            return year + '年' + month  + '月' + day + '日'
        };
</script>

<template>
<div class="mx-12 my-6 px-40 py-6 bg-white">
    <div class="border border-black-900 m-4 p-2 h-28 overflow-y-scroll">
        <table>
            <thead>
                <th class="w-2/7"></th>
                <th class="w-5/7"></th>
            </thead>
            <tbody class="m-2 p-2">
                <tr v-for="record in records" :key=record.id class="flex gap-6">
                    <td class="py-2">
                        {{ todaystring(record.record_date) }}
                    </td>
                    <td class="py-2">
                        <a :href="route('record.show', record.id)" class="text-blue-600">
                             {{ record.title }}
                         </a>
                    </td>
                </tr>
             </tbody>
        </table>
    </div>
</div>
</template>