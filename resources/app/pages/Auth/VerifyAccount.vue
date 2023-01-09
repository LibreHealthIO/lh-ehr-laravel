<template>
    <div class="w-full flex flex-col justify-center">
        <form class="w-full flex flex-col items-center" @submit.prevent="sendVerificationEmail">
            <div class="w-full px-10 pt-8 pb-4">
                <h1 class="text-2xl text-center md:text-left font-bold md:text-4xl mb-6 tracking-tight">
                    {{ $t('general.verify_account') }}
                </h1>
                <div v-if="$page.props.flash.error" class="w-full my-5 py-5 px-3 text-gray-800 bg-red-100 border border-red-200 rounded-lg" role="alert">
                    <p class="font-bold text-red-600">{{ $t('general.oops_error') }}</p>
                    <p v-html="$page.props.flash.error"/>
                </div>
                <div v-if="$page.props.flash.success" class="p-4 mb-4 border border-green-300 rounded-lg bg-green-100 dark:bg-green-200" role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium text-green-700 dark:text-green-800">
                            {{ $t('general.reset_link_title') }}!
                        </h3>
                    </div>
                    <div v-html="$t('general.reset_link_paragraph', { email: $page.props.auth.user.email })" class="mt-2 mb-4 text-sm text-green-700 dark:text-green-800"/>
                    <div class="flex">
                        <button
                            @click="triggerForm"
                            type="button" class="text-green-700 bg-transparent border border-green-700 hover:bg-green-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-green-800 dark:text-green-800 dark:hover:text-white" data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                            {{ $t('general.resend') }}
                        </button>
                    </div>
                </div>
                <div class="w-full grid grid-cols-6 gap-6 md:text-lg">
                    <div class="col-span-6" v-html="$t('general.email_not_verified_text')"></div>
                </div>
                <div class="flex flex-col w-auto items-center justify-center my-4">
                    <button
                        @click="triggerForm"
                        :type="'submit'"
                        class="w-full flex items-center justify-center text-center px-8 py-3 my-2 mr-2 text-base text-white transition duration-500 ease-in-out transform bg-gray-900 border-gray-700 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-theme-3">
                        {{ $t('general.resend') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import i18n from "../../i18n"
import AuthLayout from '../../layouts/AuthLayout.vue'

export default {
    name: "VerifyAccount",
    metaInfo: {
        title: i18n.t('general.verify_account')
    },
    layout: AuthLayout,
    props: {
        errors: Object
    },
    data() {
        return {
            loginForm: this.$inertia.form({}),
            showVerifyForm: false
        }
    },
    methods: {
        triggerForm() {
            if (!this.showVerifyForm) {
                this.showVerifyForm = !this.showVerifyForm
            }
        },
        sendVerificationEmail() {
            this.loginForm.post(this.route('verification.send'))
        },
    },
}
</script>
