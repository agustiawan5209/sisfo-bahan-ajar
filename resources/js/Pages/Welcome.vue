<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { gsap } from 'gsap';
import Portfolio from '@/Components/Portfolio.vue';
import Feature from '@/Components/Feature.vue';
import Footer from '@/Components/Footers/Footer.vue';
// SVG
// import { DrawSVGPlugin } from "gsap/DrawSVGPlugin";
// gsap.registerPlugin(DrawSVGPlugin);
// Motion
import { MotionPathPlugin } from "gsap/MotionPathPlugin";
gsap.registerPlugin(MotionPathPlugin);
const showMenu = ref(false);
const textone = ref(null)
// GSAP fungsi
// onMounted(() => {
//   gsap.from(textone.value, {
//     x: -1000,
//     duration: 1,
//   });
// });
// Animasi Text Mengetik
const textContainer = ref(null);
const typedText = ref("");
// SVG animasi infinite
const svgRef = ref(null);
const gifOne = ref(null)
onMounted(() => {
    const text = "(SISTEM INFORMASI BAHAN AJAR)";
    const textArray = text.split("");
    let index = 0;
    function typeText() {
        if (index < textArray.length) {
            typedText.value += textArray[index];
            index++;
            gsap.delayedCall(0.1, typeText);
        }
    }
    typeText();
    setInterval(function () {
        typedText.value = ""
        index = 0;
        typeText();
    }, 5000)
    // Text Paragraph
    gsap.fromTo(textContainer.value, {
        opacity: 0,
    }, {
        opacity: 1,
        duration: 2,
        delay: 0.5
    })
    gsap.fromTo(svgRef.value, {
        y: "0%",
    },
        {
            y: "3%",
            duration: 4,
            ease: "bounce.out",
            repeat: -1,
        }
    );
    gsap.fromTo(gifOne.value, {
        x: '-40%',
    }, {
        x: '0%',
        duration: 4,
        ease: "bounce.out",
    })
});
</script>

<template>

    <Head title="Welcome" />
    <main>
        <section class="w-full px-6 pb-12 antialiased bg-neutral">
            <div class="mx-auto max-w-7xl">

                <nav class="relative z-50 h-24 select-none">
                    <div
                        class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
                        <div class="flex items-center justify-start w-1/4 h-full pr-4">
                            <a href="#_" class="inline-block py-4 md:py-0">
                                <span class="p-1 text-xl font-black leading-none text-primary">MATERI PELAJARAN.</span>
                            </a>
                        </div>
                        <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                            :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
                            <div
                                class="flex-col w-full h-auto overflow-hidden bg-neutral rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                                <a href="#_"
                                    class="items-center block w-auto h-16 px-6 text-xl font-black leading-none text-primary md:hidden">PT.
                                    MATERI PELAJARAN.<span class="text-secondary">.</span></a>
                                <div
                                    class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                                    <Link :href="route('login')"
                                        class="w-full px-3 py-2 mr-0 text-primary md:mr-2 lg:mr-3 md:w-auto">Masuk
                                    </Link>
                                    <Link :href="route('register')"
                                        class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-secondary md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-primary focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-secondary transition-all ease-linear">
                                    Daftar</Link>
                                </div>
                            </div>
                        </div>
                        <div @click="showMenu = !showMenu"
                            class="absolute right-0 flex flex-col items-end justify-center w-10 h-10 bg-neutral rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                            <svg class="w-6 h-6 text-primary" x-show="!showMenu" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                x-cloak>
                                <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg class="w-6 h-6 text-primary" x-show="showMenu" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                </nav>

                <!-- Main Hero Content -->
                <div
                    class="container max-w-lg flex flex-wrap px-4 md:py-32 mx-auto mt-px text-left md:max-w-none md:text-center">
                    <div class="w-1/2 h-max box-border relative">
                        <h1 ref="textone"
                            class="text-one text-3xl font-extrabold leading-10 tracking-tight text-left text-primary md:text-center sm:leading-none md:text-6xl ">
                            <img class="absolute -z-10" :src="'/svg/sssplatter.svg'" />
                            <span class="inline md:block">SIBA</span> <span
                                class="relative mb-6 text-transparent bg-clip-text bg-gradient-to-br from-secondary to-primary md:inline-block">{{
                                typedText }}</span>
                        </h1>
                        <div ref="textContainer"
                            class="mx-auto mt-7 z-50 text-secondary md:mt-12 md:max-w-lg md:text-center lg:text-4xl capitalize">
                            ............................
                        </div>
                    </div>
                    <div class="w-1/2 h-full relative ">
                        <img ref="svgRef" class="md:absolute  md:-top-28  drop-shadow-2xl"
                            :src="'/images/bendy-language-learning-in-mobile-app.gif'" alt="Svg Timbangan">
                    </div>
                </div>
                <!-- End Main Hero Content -->

                <!-- Fitur Content -->
                <Feature />


                <section class="d">
                    <div
                        class="container flex flex-col justify-center p-6 mx-auto sm:py-8 lg:py-12 lg:flex-row lg:justify-between relative">
                        <div
                            class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                            <img ref="gifOne" :src="'/images/vivid-classes-at-the-university.gif'" alt=""
                                class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                        </div>
                        <div
                            class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-2xl lg:text-left">
                            <h1 class="text-xl md:text-3xl font-bold leading-9">Daftar untuk menggunakan Sistem Informasi Materi
                                Guru dan rasakan manfaatnya dalam meningkatkan kualitas pembelajaran!
                            </h1>
                            <p class="mt-6 mb-8 text-sm md:text-lg sm:mb-12">
                                Kontak:

                                Email: URL email

                                Nomor Telepon: URL nomor telepon

                                Website:

                                https://www.website.com/

                                Media Sosial:

                                Facebook: URL Facebook

                                Instagram: URL Instagram
                            </p>
                        </div>
                    </div>
                </section>

            </div>
        </section>

        <Footer></Footer>
    </main>
</template>

<style></style>
