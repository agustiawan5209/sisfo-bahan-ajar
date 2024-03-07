<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'text-primary hover:text-secondary transition-all'
        : 'text-gray-600 hover:text-red-400 transition-all'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
