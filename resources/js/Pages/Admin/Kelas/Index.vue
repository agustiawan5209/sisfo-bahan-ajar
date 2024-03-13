<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import CardTable from "@/Components/Cards/CardTable.vue";
import { ref, defineProps } from 'vue';
import DrawerModal from '@/Components/Modals/DrawerModal.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Modal from "@/Components/Modals/Modal.vue";

const props = defineProps({
    kelas: {
        type: Object,
        default: () => ({})
    }
})

const Form = useForm({
    nama: '',
})

const ModalShow = ref(false);

function ShowModal() {
    ModalShow.value = true;
}

function submit(){
    Form.post(route('Admin.Kelas.store'), {
        preserveState:true,
        onSuccess:()=>{
           ModalShow.value=false;
        }
    })
}

// Edit data

const EditForm = useForm({
    nama: '',
    id: null,
})
const EditModal = ref(false);

function showEditModal(){
    EditModal.value= true;
}

function editTabelModal(item){
    EditForm.nama = item.nama;
    EditForm.id = item.id;
    showEditModal()
}
function submitEdit(){
    EditForm.put(route('Admin.Kelas.update'), {
        preserveState:true,
        onSuccess:()=>{
          CloseModal()
        }
    })
}

// Fungsi Untuk Menghapus
const DeleteForm = useForm({
    nama: '',
    id: null,
})
const DeleteModal = ref(false);

function showDeleteModal(){
    DeleteModal.value= true;
}

function DeleteTabelModal(item){
    DeleteForm.nama = item.nama;
    DeleteForm.id = item.id;
    showDeleteModal()
}

function submitDelete(){
    DeleteForm.delete(route('Admin.Kelas.destroy'), {
        preserveState:true,
        preserveScroll:true,
        onSuccess:()=>{
          CloseModal()
        }
    })
}


function CloseModal() {
    ModalShow.value = false;
    EditModal.value = false;
    DeleteModal.value=false;
}

</script>

<template>

    <Head title="Data-Kelas" />

    <AuthenticatedLayout>

        <div class="bg-white ">
            <!-- Modal Untuk Tambah Data -->
            <DrawerModal :modalshow="ModalShow">
                <template #title>
                    <span class="text-white">Tambah Kelas</span>
                </template>
                <template #close>
                    <div class="" @click="CloseModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                    </div>
                </template>

                <template #content>
                    <form @submit.prevent="submit" class="space-y-4">
                        <div class="flex flex-col gap-2">
                            <InputLabel for="nama" class="!text-base">Nama Kelas</InputLabel>
                            <TextInput v-model="Form.nama" type="text" name="nama" id="nama"/>
                            <InputError :message="Form.errors.nama" class="w-full" />
                        </div>
                        <div class="flex flex-col justify-center gap-3 mt-6 sm:flex-row">
                            <Primary-button class="px-6 py-2 rounded-sm bg-white !text-gray-600 hover:!text-white" type="button" @click="CloseModal">Tutup</Primary-button>
                            <primary-button type="submit" class="px-6 py-2 rounded-sm shadow-sm bg-accent text-gray-50 hover:bg-orange-600 hover:text-white transition-all">Simpan</primary-button>
                        </div>
                    </form>
                </template>

            </DrawerModal>
            <!-- Modal Untuk Edit Data -->
            <DrawerModal :modalshow="EditModal">
                <template #title>
                    <span class="text-white">Tambah Kelas</span>
                </template>
                <template #close>
                    <div class="" @click="CloseModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                    </div>
                </template>

                <template #content>
                    <form @submit.prevent="submitEdit" class="space-y-4">
                        <div class="flex flex-col gap-2">
                            <InputLabel for="nama" class="!text-base">Nama Kelas</InputLabel>
                            <TextInput v-model="EditForm.nama" type="text" name="nama" id="nama"/>
                            <InputError :message="EditForm.errors.nama" class="w-full" />
                        </div>
                        <div class="flex flex-col justify-center gap-3 mt-6 sm:flex-row">
                            <Primary-button class="px-6 py-2 rounded-sm bg-white !text-gray-600 hover:!text-white" type="button" @click="CloseModal">Tutup</Primary-button>

                            <primary-button type="submit" class="px-6 py-2 rounded-sm shadow-sm bg-accent text-gray-50 hover:bg-orange-600 hover:text-white transition-all">Simpan</primary-button>
                        </div>
                    </form>
                </template>

            </DrawerModal>

            <!-- Modal Untuk Hapus Data -->
            <Modal :show="DeleteModal">
                <div class="flex flex-col max-w-full gap-2 p-6 rounded-md shadow-md bg-gray-50 text-gray-800">
                    <h2 class="flex items-center gap-2 text-xl font-semibold leading-tight tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 fill-current shrink-0 !text-accent">
                            <path d="M451.671,348.569,408,267.945V184c0-83.813-68.187-152-152-152S104,100.187,104,184v83.945L60.329,348.568A24,24,0,0,0,81.432,384h86.944c-.241,2.636-.376,5.3-.376,8a88,88,0,0,0,176,0c0-2.7-.135-5.364-.376-8h86.944a24,24,0,0,0,21.1-35.431ZM312,392a56,56,0,1,1-111.418-8H311.418A55.85,55.85,0,0,1,312,392ZM94.863,352,136,276.055V184a120,120,0,0,1,240,0v92.055L417.137,352Z"></path>
                            <rect width="32" height="136" x="240" y="112"></rect>
                            <rect width="32" height="32" x="240" y="280"></rect>
                        </svg>Apakah Anda Yakin Ingin menghapus {{DeleteForm.nama}}?
                    </h2>
                    <!-- <p class="flex-1 text-gray-600">Mauris et lorem at elit tristique dignissim et ullamcorper elit. In sed feugiat mi. Etiam ut lacinia dui.</p> -->
                    <div class="flex flex-col justify-end gap-3 mt-6 sm:flex-row">
                        <PrimaryButton class="px-6 py-2 rounded-sm" @click="CloseModal()">No</PrimaryButton>
                        <PrimaryButton @click="submitDelete()" class="px-6 py-2 rounded-sm shadow-sm !bg-accent text-gray-50">Yes</PrimaryButton>

                    </div>
                </div>
            </Modal>

            <CardTable :datalink="kelas" :url="'Admin.Kelas.index'" :filterdata="false">
                <template #title>
                    Data Kelas
                </template>
                <template #add>
                    <PrimaryButton @click="ShowModal" type="button" class="bg-primary">Tambah</PrimaryButton>

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
                        <th class="border-t-0 px-1.5 md:px-3 align-middle border border-black whitespace-nowrap p-4">
                            {{ (kelas.current_page - 1) * kelas.per_page + index + 1 }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border border-black whitespace-nowrap p-4">
                            {{ item.nama }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border border-black whitespace-nowrap p-4">
                          <div class="flex gap-4">
                            <PrimaryButton  @click="DeleteTabelModal(item)">
                                <font-awesome-icon :icon="['fas', 'trash']" />
                           </PrimaryButton>
                            <PrimaryButton @click="editTabelModal(item)">
                                <font-awesome-icon :icon="['fas', 'pen']" />
                           </PrimaryButton>
                          </div>
                        </td>
                    </tr>
                </template>

            </CardTable>
        </div>
    </AuthenticatedLayout>
</template>
