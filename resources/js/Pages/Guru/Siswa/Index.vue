<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardTable from "@/Components/Cards/CardTable.vue";
import { ref, defineProps } from 'vue';

const props = defineProps({
    siswa: {
        type: Object,
        default: () => ({})
    }
})
console.log(props.siswa)
</script>

<template>

    <Head title="Data-Siswa" />

    <AuthenticatedLayout>

        <div class="bg-white ">
            <CardTable>
                <template #title>
                    Data Siswa
                </template>

                <template #header>
                    <tr>
                        <th
                            class="px-3 align-middle border border-black py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                            No
                        </th>
                        <th
                            class="px-3 align-middle border border-black py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                            Nama
                        </th>
                        <th
                            class="px-3 align-middle border border-black py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                            Email
                        </th>
                        <th
                            class="px-3 align-middle border border-black py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                        </th>
                    </tr>
                </template>

                <template #body>
                    <tr v-for="(item, index) in siswa.data" :key="item.id" :index="index">
                        <th
                            class="border-t-0 px-1.5 md:px-3 align-middle border border-black text-xs md:text-sm whitespace-nowrap p-4">
                            {{ (siswa.current_page -1) * siswa.per_page + index + 1 }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border border-black text-xs md:text-sm whitespace-nowrap p-4">
                            {{ item.name }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border border-black text-xs md:text-sm whitespace-nowrap p-4">
                            {{ item.email }}
                        </td>
                    </tr>
                </template>

            </CardTable>
        </div>
    </AuthenticatedLayout>
</template>
