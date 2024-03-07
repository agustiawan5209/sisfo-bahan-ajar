<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import HeaderStats from "@/Components/Headers/HeaderStats.vue";

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <header-stats />
    </AuthenticatedLayout>
</template>
