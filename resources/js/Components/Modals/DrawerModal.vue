<template>

    <Teleport to="body">
        <!-- drawer component -->
        <div v-show="modalshow"
            class="fixed top-0 right-0 z-40 w-full h-screen max-w-md p-4 overflow-y-auto transition-transform  bg-primary shadow-white shadow-lg"
            tabindex="-1" aria-labelledby="drawer-label" aria-hidden="false">
            <h5 id="drawer-label"
                class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase ">
                <slot name="title"/>
            </h5>
            <button type="button" data-drawer-dismiss="drawer-create-product-default"
                aria-controls="drawer-create-product-default"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
               <slot name="close"/>
            </button>
            <slot name="content"/>
        </div>
    </Teleport>
</template>

<script>
export default {
    props: {
        modalshow: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            showModal: this.modalshow,
        }
    },
    methods: {
        closeModal() {
            console.log(this.showModal)
            this.showModal = false
            this.$emit('update:modalshow', false)
        },
    },
}
</script>
