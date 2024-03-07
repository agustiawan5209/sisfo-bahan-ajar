<script setup>
import UserDropdown from "@/Components/DropdownNavbar.vue";
import NavLink from "@/Components/NavLink.vue";
import { Link, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

const collapseShow = ref('hidden');
const isActive = ref(true);

function toggleCollapseShow(classes) {
    collapseShow.value = classes;
}
const user = usePage().props.auth;

console.log(user)


function role_exist(role){
    if(user.role.indexOf(role) !== -1){
        return true;
    }else{
        return false;
    }
}
</script>

<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
            <!-- Toggler -->
            <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button" v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <Link
                class="md:block text-left md:pb-2 text-secondary mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                href="/">
            Home
            </Link>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">

                <li class="inline-block relative">
                    <user-dropdown />
                </li>
            </ul>
            <!-- Collapse -->
            <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                v-bind:class="collapseShow">
                <!-- Collapse header -->
                <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-secondary">
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <Link
                                class="md:block text-left md:pb-2 text-secondary mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                href="/">
                            Home
                            </Link>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                v-on:click="toggleCollapseShow('hidden')">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-6 mb-4 md:hidden">
                    <div class="mb-3 pt-0">
                        <input type="text" placeholder="Search"
                            class=" px-3 py-2 h-12 border border-solid border-secondary placeholder-secondary text-secondary bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal" />
                    </div>
                </form>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    Data Siswa Pages
                </h6>
                <!-- Navigation -->

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            <span class="text-xs uppercase py-3 font-bold inline-flex gap-2">
                                <font-awesome-icon :icon="['fas', 'home']" />
                                Dashboard
                            </span>
                        </NavLink>
                    </li>

                    <li class="items-center" v-if="role_exist('guru')">
                        <NavLink :href="route('Guru.Siswa.index')" :active="route().current('Guru.Siswa.index')">
                            <span class="text-xs uppercase py-3 font-bold inline-flex gap-2">
                                <font-awesome-icon :icon="['fas', 'school']" />
                                Data Siswa
                            </span>
                        </NavLink>
                    </li>

                    <li class="items-center"  v-if="role_exist('admin')">
                        <NavLink :href="route('Admin.Kelas.index')">
                            <span class="text-xs uppercase py-3 font-bold inline-flex gap-2">
                                <font-awesome-icon :icon="['fas', 'table']" />

                                Kelas
                            </span>
                        </NavLink>
                    </li>

                    <li class="items-center">
                        <NavLink href="#maps">
                            <span href=":javascript(0)" class="text-xs uppercase py-3 font-bold inline-flex gap-2">
                                <font-awesome-icon :icon="['fas', 'map-location']" />
                                Maps
                            </span>
                        </NavLink>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
</template>



