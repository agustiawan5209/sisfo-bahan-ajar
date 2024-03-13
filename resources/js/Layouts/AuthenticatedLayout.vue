<script setup>
import AdminNavbar from '@/Components/Navbars/AdminNavbar.vue'
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import FooterAdmin from "@/Components/Footers/FooterAdmin.vue";
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
const showingNavigationDropdown = ref(false);

</script>

<template>
    <teleport to='body' >
        <flash-message/>
    </teleport>
    <div>

        <sidebar />

        <div class="relative md:ml-64 bg-primary h-screen">
            <admin-navbar />
            <div class="relative bg-primary px-5 md:px-3 md:pt-20 pb-12 pt-12 overflow-auto">
                <slot />
            </div>
            <div class="px-4 md:px-10 mx-auto w-full -m-24">

                <footer-admin />
            </div>
        </div>
    </div>
</template>
