<template>
    <div>
        <form @submit.prevent="submit" method="post" class="px-5 pb-2 flex flex-col justify-center">
            <inertia-link :href="route('login')">
                <img class="h-10 mt-2 mb-5 justify-center px-20" :src="'/images/logos/ehr_logo.png'" alt="LibreHealth Logo">
            </inertia-link>
            <div class="w-full px-10 pt-10 pb-4">
                <h1 class="text-sm text-center md:text-left font-bold md:text-xl my-2 underline">
                    {{ $t('general.forgot_password') }}
                </h1>
                <p class="my-4">Forgot your password? no worries reset it here and recover your account</p>
                <div v-if="form.errors.email" class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <p class="font-bold">{{ $t('general.oops_error') }}</p>
                    <p v-html="form.errors.email"/>
                </div>
                <div class="w-full grid grid-cols-6 gap-6 mt-4 mb-6">
                    <div class="col-span-6">
                        <ehr-input
                            v-model="form.email"
                            :error="errors.email"
                            :label="$t('forms.email')"
                            :placeholder="$t('forms.email')"
                            required
                        />
                    </div>
                </div>
                <div class="flex flex-col w-auto items-center justify-center my-4">
                    <button type="submit" class="w-full inline-flex items-center justify-center text-center px-8 py-3 my-2 mr-2 text-base text-white transition duration-500 ease-in-out transform bg-gray-900 border-gray-700 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-theme-3">
                        <icon v-if="form.processing" :class="form.processing ? 'animate-spin' : ''" name="circle-loader" class="w-5 h-5 mx-2 "/>
                        {{ $t('general.reset_password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import AuthLayout from '../../layouts/AuthLayout.vue'
import i18n from "../../i18n"

export default {
    name: "ResetPassword",
    props: {
        errors: Object,
    },
    metaInfo: {
        title: i18n.t('general.reset_password')
    },
    layout: AuthLayout,
    data() {
        return {
            form: this.$inertia.form({ email: null })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('password.request.send'))
        }
    },
}
</script>
