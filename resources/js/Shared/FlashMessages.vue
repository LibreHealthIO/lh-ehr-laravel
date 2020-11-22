<template>
    <div class="absolute right-0 top-10 z-50">
        <div v-if="$page.flash.success && show" class="mb-3 mt-8 bg-green-100 border-green-500 text-green-900 rounded-b border-t-4 px-4 py-3 shadow-md " role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-sm py-2 font-semibold">
                    {{ $page.flash.success }}
                </p>
                <button type="button" class="group mr-2 p-2" @click="show = false">
                    <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908"><path d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z" /></svg>
                </button>
            </div>
        </div>

        <div v-if="($page.flash.error || Object.keys($page.errors).length > 0) && show" class="mb-3 mt-8 bg-red-100 border-red-500 text-red-900 rounded-b border-t-4 px-4 py-3 shadow-md " role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                </div>
                <p v-if="$page.flash.error" class="text-sm py-2 font-semibold">
                    {{ $page.flash.error }}
                </p>
                <p v-else="$page.flash.error" class="text-sm py-2 font-semibold">
                    <span v-if="Object.keys($page.errors).length === 1">There is one form error.</span>
                    <span v-else>There are {{ Object.keys($page.errors).length }} form errors.</span>
                </p>
                <button type="button" class="group mr-2 p-2" @click="show = false">
                    <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908"><path d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z" /></svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import Notifications from 'vue-notification'

    Vue.use(Notifications);
    export default {
        name: "FlashMessages",
        data() {
            return {
                show: true,
            }
        },
        watch: {
            '$page.flash': {
                handler() {
                    this.show = true
                },
                deep: true,
            },
        },
    }
</script>

<style scoped>

</style>
