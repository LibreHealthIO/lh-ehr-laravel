<template>
    <div class="flex min-h-screen bg-white py-8 px-4">
        <div
            class="w-1/2 mx-auto bg-white rounded shadow-md p-6 overflow-y-auto no-scrollbar"
        >
            <div v-if="status != 'pending'">
                <!-- Show expired message if the token is expired -->
                <div class="mb-4 text-center">
                    <p class="text-3xl text-red-600 font-bold">
                        Invitation {{ status }}. Please Contact Admin.
                    </p>
                </div>
            </div>
            <div v-if="showOptions && status == 'pending'">
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

            <div v-if="showAddPasswordForm">
                <!-- Show the Add Password form -->
                <h2 class="text-2xl font-bold mb-4 text-center">
                    Add Password
                </h2>
                <form @submit.prevent="addPassword" method="post">
                    <p class="text-lg text-center mb-5">
                        This invitation is for
                        <span class="font-bold">{{ email }}</span
                        >. Add a password to login into the account.
                    </p>

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
                    <div class="mb-4">
                        <ehr-input
                            v-model="confirmPassword"
                            :label="'Confirm Password'"
                            :placeholder="'Confirm Password'"
                            type="password"
                            required
                        />
                    </div>
                    <p
                        v-if="showPasswordMismatchError"
                        class="text-red-500 mb-5"
                    >
                        Password and Confirm Password must match.
                    </p>
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
        status: String,
        email: String,
    },
    data() {
        return {
            message: null,
            passwordForm: this.$inertia.form({
                token: null,
                password: null,
                reject: false,
            }),
            confirmPassword: null,
            passwordsMatch: true,
            showAddPasswordForm: false,
            showOptions: true,
        };
    },
    computed: {
        showPasswordMismatchError() {
            return (
                this.passwordForm.password !== this.confirmPassword &&
                !this.passwordsMatch
            );
        },
    },
    methods: {
        addPassword() {
            this.passwordsMatch =
                this.passwordForm.password === this.confirmPassword;

            if (!this.passwordsMatch) {
                this.errors.confirmPassword =
                    "Password and Confirm Password must match.";
                return;
            }
            this.errors.confirmPassword = null; // Reset the error if passwords match
            this.passwordForm.post(this.route("invitation.accept"));
        },

        acceptInvitation() {
            // Add logic to accept the invitation here
            this.showOptions = false;
            this.showAddPasswordForm = true;
        },

        rejectInvitation() {
            console.log("reject invitation");
            this.passwordForm.reject = true;
            this.passwordForm.post(this.route("invitation.accept"));
        },
    },

    created() {
        this.passwordForm.token = this.route().params.token;
        // this.$on("submit", this.addPassword);
    },
};
</script>
