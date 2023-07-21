<template>
    <div class="flex min-h-screen bg-white py-8 px-4">
        <div
            class="w-1/2 mx-auto bg-white rounded shadow-md p-6 overflow-y-auto no-scrollbar"
        >
            <h2 class="text-2xl font-bold mb-4">Add Password</h2>
            <form @submit.prevent="addPassword" method="post">
                <div class="mb-4">
                    <ehr-input
                        v-model="passwordForm.username"
                        :error="errors.username"
                        :label="'User Name'"
                        :placeholder="'Enter User Name'"
                        required
                        disabled
                    />
                </div>
                <div class="mb-4">
                    <ehr-input
                        v-model="passwordForm.token"
                        :error="errors.token"
                        :label="'Token'"
                        :placeholder="'Enter Token'"
                        required
                        disabled
                    />
                </div>
                <div class="mb-4">
                    <ehr-input
                        v-model="passwordForm.password"
                        :error="errors.password"
                        :label="'Password'"
                        :placeholder="'Enter Password'"
                        type="password"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddPassword",
    props: {
        errors: Object,
    },
    data() {
        return {
            passwordForm: this.$inertia.form({
                expires: null,
                username: null,
                token: null,
                password: null,
            }),
        };
    },

    mounted() {},
    methods: {
        addPassword() {
            this.passwordForm.post(this.route("users.verify"));
        },
    },

    created() {
        this.passwordForm.username = this.route().params.username;
        this.passwordForm.token = this.route().params.token;
        this.passwordForm.expires = this.route().params.expires;
        this.$on("submit", this.addPasswordPassword);
    },
};
</script>
