<template>
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg">
                        <slot name="title" />
                    </h3>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <table class="items-center w-full bg-transparent border-collapse">
                <colgroup>
                <col class="w-5 md:w-10">
                </colgroup>
                <thead>
                    <slot name="header" />
                </thead>

                <tbody>
                    <slot name="body" />

                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>


</script>
