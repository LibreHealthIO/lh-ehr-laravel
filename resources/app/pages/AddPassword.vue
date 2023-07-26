<template>
    <div class="flex min-h-screen bg-white py-8 px-4">
        <div
            class="w-1/2 mx-auto bg-white rounded shadow-md p-6 overflow-y-auto no-scrollbar"
        >
            <div v-if="showExpiredMessage">
                <!-- Show expired message if the token is expired -->
                <div class="mb-4 text-center">
                    <p class="text-3xl text-red-600 font-bold">
                        Invitation {{ message }}
                    </p>
                </div>
            </div>
            <div v-if="!showExpiredMessage && showOptions">
                <!-- Show the Accept or Reject Invitation button -->
                <h2 class="text-2xl font-bold mb-4 text-center">
                    Accept Invitation
                </h2>

                <div class="mb-4 text-center">
                    <button
                        @click="acceptInvitation()"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                    >
                        Accept Invitation
                    </button>
                    <button
                        @click="rejectInvitation()"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-8 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        Reject Invitation
                    </button>
                </div>
            </div>

            <div v-if="!showExpiredMessage && showAddPasswordForm">
                <!-- Show the Add Password form -->
                <h2 class="text-2xl font-bold mb-4 text-center">
                    Add Password
                </h2>
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
                            v-model="passwordForm.password"
                            :error="errors.password"
                            :label="'Password'"
                            :placeholder="'Enter Password'"
                            type="password"
                            required
                        />
                    </div>
                    <div class="text-center">
                        <button
                            type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-8 rounded focus:outline-none focus:ring-2 focus:ring-orange-500"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "AddPassword",
    props: {
        errors: Object,
    },
    data() {
        return {
            code: null,
            message: null,
            passwordForm: this.$inertia.form({
                expires: null,
                username: null,
                code: null,
                password: null,
            }),
            showExpiredMessage: true,
            showAddPasswordForm: false,
            showOptions: true,
        };
    },

    methods: {
        addPassword() {
            this.passwordForm.post(this.route("invitation.accept"));
        },

        acceptInvitation() {
            // Add logic to accept the invitation here
            this.showOptions = false;
            this.showAddPasswordForm = true;
        },

        rejectInvitation() {
            console.log("reject invitation");
            axios
                .post(this.route("invitation.reject"), { code: this.code })
                .then((response) => {
                    if (response.data.status == "success") {
                        this.message = "Rejected";
                        this.showExpiredMessage = true;
                        this.showOptions = false;
                        this.showAddPasswordForm = false;
                    }
                });
        },
        tokenExpired(code) {
            axios
                .post(this.route("invitation.status"), { code: code })
                .then((response) => {
                    if (response.data.status != "pending") {
                        this.message = response.data.status;
                        this.showExpiredMessage = true;
                        this.showOptions = false;
                        this.showAddPasswordForm = false;
                        return true;
                    } else {
                        this.showExpiredMessage = false;
                        this.showOptions = true;
                        return false;
                    }
                });
        },
    },

    created() {
        this.passwordForm.username = this.route().params.username;
        this.passwordForm.code = this.route().params.code;
        this.code = this.route().params.code;
        this.passwordForm.expires = this.route().params.expires;
        this.$on("submit", this.addPassword);
        this.tokenExpired(this.code);
    },
};
</script>
