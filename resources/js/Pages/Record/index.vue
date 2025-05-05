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
    <div class="bg-white mx-24 my-12 px-12 py-6">
        <table>
            <thead>
                <th class="w-2/7"></th>
                <th class="w-5/7"></th>
            </thead>
            <tbody class="m-2 p-2">
                <tr v-for="record in records" :key=record.id class="flex gap-6">
                    <td class="py-4">
                        {{ todaystring(record.record_date) }}
                    </td>
                    <td class="py-4">
                        <a :href="route('record.show', record.id)" class="text-blue-600">
                             {{ record.title }}
                         </a>
                    </td>
                </tr>
             </tbody>
        </table>
    </div>
</template>