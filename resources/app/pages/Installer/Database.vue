<template>
    <div class="px-5 md:px-10">
        <h1 class="text-sm text-center md:text-left font-bold md:text-xl my-2 underline">
            Database Setup and Config
        </h1>
        {{ sites }}
        <div class="w-full grid grid-cols-6 gap-2 my-8">
            <div class="col-span-3 px-3">
                <ehr-input
                    v-model="form.account"
                    :error="errors.account"
                    :label="$t('forms.email') + '/' + $t('forms.username')"
                    :placeholder="$t('forms.email') + '/' + $t('forms.username')"
                    required
                />
            </div>
            <div class="col-span-3 px-3">
                <ehr-input
                    v-model="form.password"
                    type="password"
                    :error="errors.password"
                    :label="$t('forms.password')"
                    :placeholder="$t('forms.secret')"
                    required
                />
            </div>
        </div>
    </div>
</template>

<script>
import InstallerLayout from "../../layouts/InstallerLayout.vue"

export default {
    name: "Installer_Database",
    layout: InstallerLayout,
    props: {
        errors: Object,
        sites: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                account: null,
                password: null,
                remember: false,
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('login.post'))
        },
    },
}
</script>

<style scoped>

</style>
