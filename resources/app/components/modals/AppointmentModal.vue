<template>
    <div :id="id" class="modal z-9999" role="dialog" tabindex="-1">
        <div class="modal__content modal__content--xl px-8 py-3 relative">
            <button class="absolute right-0 top-0 mt-3 mr-3" @click="closeModal()">
                <Icon class="w-5 h-5 text-gray-500" name="x"/>
            </button>
            <div class="h-64 flex w-full items-center justify-center">
                <div class="p-10 md:p-20 flex flex-col">
                    <img :src="'/images/logo.gif'" class="w-10 h-10 md:w-20 md:h-20" alt="Loading">
                    <p class="font-bold my-2">
                        Create an appointment
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import cash from "cash-dom/dist/cash";
export default {
    name: "AppointmentModal",
    props: {
        id: {
            type: String,
            default: 'appointment-modal'
        },
    },
    data() {
        return {
           //
        }
    },
    methods: {
        openModal() {
            cash("#" + this.id).modal("show")
        },
        closeModal() {
            cash("#" + this.id).modal("hide")
        },
    }
}
</script>

<style scoped>

</style>
