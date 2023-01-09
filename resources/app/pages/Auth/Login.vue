<template>
    <div>
        <form @submit.prevent="login" method="post" class="px-5 pb-2 flex flex-col justify-center">
            <inertia-link :href="route('login')">
                <img class="h-10 mt-2 mb-5 justify-center px-20" :src="'images/logos/ehr_logo.png'" alt="LibreHealth Logo">
            </inertia-link>
            <div class="-mx-2 my-5">
                <div class="w-full grid grid-cols-6 gap-6 mt-10">
                    <div class="col-span-6 px-3">
                        <ehr-input
                            v-model="loginForm.account"
                            :error="errors.account"
                            :label="$t('forms.email') + '/' + $t('forms.username')"
                            :placeholder="$t('forms.email') + '/' + $t('forms.username')"
                            required
                        />
                    </div>
                    <div class="col-span-6 px-3">
                        <ehr-input
                            v-model="loginForm.password"
                            type="password"
                            :error="errors.password"
                            :label="$t('forms.password')"
                            :placeholder="$t('forms.secret')"
                            required
                        />
                    </div>
                </div>
                <div class="mt-5 px-4 flex items-end text-right">
                    <inertia-link :href="route('password.request')"  class="text-sm font-semibold leading-relaxed">
                        {{ $t('general.forgot_your_password') }}
                        <span class="text-theme-1">{{ $t('general.click_here') }}</span>
                    </inertia-link>
                </div>
            </div>
            <button type="submit" class="inline-flex items-center text-white justify-center my-2 ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
                {{ $t('forms.continue') }}
                <icon v-if="loginForm.processing" :class="loginForm.processing ? 'animate-spin' : ''" name="circle-loader" class="w-5 h-5 mx-2"/>
                <icon v-else name="arrow-narrow-right" class="w-5 h-5 mx-2"/>
            </button>
        </form>
    </div>
</template>

<script>
import AuthLayout from "../../layouts/AuthLayout"

export default {
    name: 'Login',
    layout: AuthLayout,
    props: {
        errors: Object,
    },
    data() {
        return {
            loginForm: this.$inertia.form({
                account: null,
                password: null,
                remember: false,
            }),
        }
    },
    methods: {
        login() {
            this.loginForm.post(this.route('login.post'))
        },
    },
}
</script>
