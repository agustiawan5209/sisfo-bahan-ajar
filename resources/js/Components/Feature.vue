<script setup>
import { ref, onMounted } from 'vue';
import { gsap } from 'gsap/gsap-core';

const button = ref(1)
const active = 'px-2 text-xs md:text-sm py-1 border-b-2 md:border-l-2 md:border-b-0 md:py-3 border-secondary text-gray-900';
const nonactive = 'px-2 text-xs md:text-sm border-b-2 md:border-l-2 md:border-b-0 md:py-3 border-gray-700 text-gray-600';

const timeline = gsap.timeline({})
const box1 = ref(null);
const box2 = ref(null);
const box3 = ref(null);
const box4 = ref(null);
const box5 = ref(null);

onMounted(() => {
    gsap.fromTo(box1.value, {
        x: '20%',
    }, {
        x: '0%',
        duration: 2,
    })
})

function animateClick(value) {
    gsap.fromTo(box1.value, {
        x: '20%',
    }, {
        x: '0%',
        duration: 1,
        ease: 'power2.inOut',
    })
    gsap.fromTo(box2.value, {
        x: '20%',
    }, {
        x: '0%',
        duration: 1,
        ease: 'power2.inOut',
    })
    gsap.fromTo(box3.value, {
        x: '20%',
    }, {
        x: '0%',
        duration: 1,
        ease: 'power2.inOut',
    })
    gsap.fromTo(box4.value, {
        x: '20%',
    }, {
        x: '0%',
        duration: 1,
        ease: 'power2.inOut',
    })
    gsap.fromTo(box5.value, {
        x: '20%',
    }, {
        x: '0%',
        duration: 1,
        ease: 'power2.inOut',
    })
    button.value = value;
}
</script>

<template>
    <section class="py-8" >
        <div class="container mx-auto overflow-hidden">
            <div class="p-4 mx-auto text-center md:px-10 lg:px-32 xl:max-w-3xl">
                <h2 class="text-2xl font-bold leadi sm:text-4xl">Fitur-Fitur SIBA?
                </h2>
                <p class="px-8 my-4">Sistem Informasi Bahan Ajar hadir untuk membantu guru dalam mengelola
                    materi pembelajaran dan siswa dalam mengakses materi dan mengerjakan tugas. Berikut
                    adalah beberapa fitur utama yang tersedia di sistem ini</p>
            </div>
            <div class="grid grid-cols-6 p-4">
                <div
                    class="flex justify-center px-4 col-span-full md:col-span-1 md:flex-col md:justify-start md:items-start">
                    <button @click="animateClick(0)" :class="button == 0 ? active : nonactive">Manajemen
                        Materi</button>
                    <button @click="animateClick(1)" :class="button == 1 ? active : nonactive">Pembuatan
                        Tugas dan Evaluasi</button>
                    <button @click="animateClick(2)" :class="button == 2 ? active : nonactive">Analisis
                        dan Laporan</button>
                    <button @click="animateClick(3)" :class="button == 3 ? active : nonactive">Akses
                        Materi</button>
                    <button @click="animateClick(4)" :class="button == 4 ? active : nonactive">Pengisian
                        Tugas</button>
                </div>
                <div ref="box1" v-show="button == 0" class=" col-span-full md:col-span-5 md:text-left">
                    <div class="grid gap-12 py-4 text-center sm:grid-cols-2">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'laptop-file']" />
                            <h5 class="text-base font-semibold text-justify">Penyimpanan Materi: SIBA memungkinkan guru
                                untuk menyimpan berbagai jenis materi ajar dalam format digital, seperti dokumen, video,
                                audio, dan gambar.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'book-tanakh']" />
                            <h5 class="text-base font-semibold text-justify">Pengorganisasian Materi: Guru dapat
                                mengkategorikan dan mengorganisir materi ajar berdasarkan mata pelajaran, topik, kelas,
                                dan semester.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'sliders']" />
                            <h5 class="text-base font-semibold text-justify">Pencarian Materi: Fitur pencarian membantu
                                guru menemukan materi ajar yang dibutuhkan dengan mudah dan cepat.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'sliders']" />
                            <h5 class="text-base font-semibold text-justify">Pembagian Materi: Guru dapat membagikan
                                materi ajar kepada siswa secara langsung atau melalui platform pembelajaran online.</h5>
                        </div>
                    </div>
                </div>

                <div ref="box2" v-show="button == 1" class=" col-span-full md:col-span-5 md:text-left">
                    <div class="grid gap-12 py-4 text-center sm:grid-cols-2">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'laptop-file']" />
                            <h5 class="text-base font-semibold text-justify">Buat materi dalam bentuk teks dan file
                                (PDF, Word,
                                PowerPoint, dll.)</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'book-tanakh']" />
                            <h5 class="text-base font-semibold text-justify">Kategorikan materi berdasarkan mata
                                pelajaran,
                                kelas, dan topik.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'sliders']" />
                            <h5 class="text-base font-semibold text-justify">Edit dan hapus materi dengan mudah.</h5>
                        </div>
                    </div>
                </div>
                <div ref="box3" v-show="button == 2" class=" col-span-full md:col-span-5 md:text-left">
                    <div class="grid gap-12 py-4 text-center sm:grid-cols-2">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'laptop-file']" />
                            <h5 class="text-base font-semibold text-justify">Analisis Penggunaan Materi: SIBA dapat
                                melacak dan menganalisis bagaimana siswa menggunakan materi ajar, seperti berapa kali
                                materi diunduh, dilihat, dan dibagikan.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'book-tanakh']" />
                            <h5 class="text-base font-semibold text-justify">Laporan Penggunaan Materi: SIBA dapat
                                menghasilkan laporan penggunaan materi ajar yang membantu guru mengevaluasi efektivitas
                                pembelajaran dan mengidentifikasi area yang perlu ditingkatkan.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'sliders']" />
                            <h5 class="text-base font-semibold text-justify">Analisis Kinerja Siswa: SIBA dapat
                                menganalisis hasil belajar siswa dan memberikan umpan balik kepada guru untuk membantu
                                mereka meningkatkan kualitas pembelajaran.</h5>
                        </div>
                    </div>
                </div>
                <div ref="box4" v-show="button == 3" class=" col-span-full md:col-span-5 md:text-left">
                    <div class="grid gap-12 py-4 text-center sm:grid-cols-2">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'laptop-file']" />
                            <h5 class="text-base font-semibold text-justify">Akses Multi-Perangkat: Siswa dapat
                                mengakses materi ajar dari berbagai perangkat, seperti komputer, laptop, tablet, dan
                                smartphone.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'book-tanakh']" />
                            <h5 class="text-base font-semibold text-justify">Fitur Aksesibilitas: SIBA menyediakan fitur
                                aksesibilitas untuk membantu siswa berkebutuhan khusus mengakses materi ajar.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'sliders']" />
                            <h5 class="text-base font-semibold text-justify">Edit dan hapus materi dengan mudah.</h5>
                        </div>
                    </div>
                </div>
                <div ref="box5" v-show="button == 4" class=" col-span-full md:col-span-5 md:text-left">
                    <div class="grid gap-12 py-4 text-center sm:grid-cols-2">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'laptop-file']" />
                            <h5 class="text-base font-semibold text-justify">Penugasan Online: Guru dapat memberikan
                                tugas kepada siswa secara online melalui SIBA.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'book-tanakh']" />
                            <h5 class="text-base font-semibold text-justify">Pengumpulan Tugas Online: Siswa dapat
                                menyelesaikan dan menyerahkan tugas secara online melalui SIBA.</h5>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <font-awesome-icon class="text-secondary w-6 h-6 border p-2 rounded-full"
                                :icon="['fas', 'sliders']" />
                            <h5 class="text-base font-semibold text-justify">Penilaian Tugas Online: Guru dapat menilai
                                tugas siswa secara online melalui SIBA.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
