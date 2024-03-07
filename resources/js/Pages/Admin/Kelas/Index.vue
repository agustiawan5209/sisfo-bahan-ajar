<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardTable from "@/Components/Cards/CardTable.vue";
import { ref, defineProps } from 'vue';

const props = defineProps({
    kelas: {
        type: Object,
        default: () => ({})
    }
})

</script>

<template>

    <Head title="Data-Kelas" />

    <AuthenticatedLayout>

        <div class="bg-white ">
            <CardTable :datalink="kelas" :url="'Admin.Kelas.index'">
                <template #title>
                    Data Kelas
                </template>

                <template #header>
                    <tr>
                        <th
                            class="px-3 align-middle border border-black py-3 uppercase whitespace-nowrap font-semibold text-left">
                            No
                        </th>
                        <th
                            class="px-3 align-middle border border-black py-3 uppercase whitespace-nowrap font-semibold text-left">
                            Nama Kelas
                        </th>
                        <th
                            class="px-3 align-middle border border-black py-3 uppercase whitespace-nowrap font-semibold text-left">
                            Aksi
                        </th>
                    </tr>
                </template>

                <template #body>
                    <tr v-for="(item, index) in kelas.data" :key="item.id" :index="index">
                        <th
                            class="border-t-0 px-1.5 md:px-3 align-middle border border-black whitespace-nowrap p-4">
                            {{ (kelas.current_page -1) * kelas.per_page + index + 1 }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border border-black whitespace-nowrap p-4">
                            {{ item.nama }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border border-black whitespace-nowrap p-4">
                            {{ item.id }}
                        </td>
                    </tr>
                </template>

            </CardTable>
        </div>
    </AuthenticatedLayout>
</template>
