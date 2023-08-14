<template>
    <div class="min-h-screen bg-gray-100">
        <Breadcrumb :active-link="activeLink" />
        <div class="max-w-7xl mx-auto px-4 py-8 relative">
            <div class="flex justify-center">
                <h1 class="text-3xl font-semibold mb-6">User Profile</h1>
                <a :href="editLink()">
                    <button
                        class="absolute top-3 right-0 mt-8 mr-4 bg-gray-900 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow"
                    >
                        Edit Profile
                    </button>
                </a>
            </div>

            <div
                class="bg-white rounded-lg shadow-lg p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
            >
                <!-- General Details -->
                <div class="bg-gray-200 rounded-lg p-6 text-xl">
                    <h2 class="text-2xl font-semibold mb-4">General Details</h2>
                    <p class="font-semibold text-2xl">
                        {{ userData.suffix ? " " + userData.suffix : "" }}
                        {{ userData.first_name }} {{ userData.last_name }}
                    </p>
                    <p class="mb-2">
                        <span class="font-semibold">Username:</span> @{{
                            userData.username
                        }}
                    </p>
                    <p class="mb-2">
                        <span class="font-semibold">Email:</span>
                        {{ userData.email }}
                    </p>
                </div>

                <!-- ID Details -->
                <div
                    class="bg-gray-200 rounded-lg p-6 text-xl col-span-3 md:col-span-2 lg:col-span-2"
                >
                    <h2 class="text-2xl font-semibold mb-4">ID Details</h2>
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2"
                    >
                        <p class="mb-2">
                            <span class="font-semibold">NPI:</span>
                            {{ userData.npi }}
                        </p>
                        <p class="mb-2">
                            <span class="font-semibold">Federal Tax ID:</span>
                            {{ userData.federal_tax_id }}
                        </p>
                        <p class="mb-2">
                            <span class="font-semibold">Federal Drug ID:</span>
                            {{ userData.federal_drug_id }}
                        </p>
                        <p class="mb-2">
                            <span class="font-semibold">Taxonomy:</span>
                            {{ userData.taxonomy }}
                        </p>
                    </div>
                </div>

                <!-- Roles and Facility -->
                <div class="bg-gray-200 rounded-lg p-6 text-xl">
                    <h2 class="text-2xl font-semibold mb-4">
                        Roles and Facility
                    </h2>
                    <p class="mb-2">
                        <span class="font-semibold">Invitation Status:</span>
                        <span
                            :class="{
                                'text-green-500 font-semibold':
                                    userData.invitation_details.status ===
                                    'accepted',
                                'text-yellow-500 font-semibold':
                                    userData.invitation_details.status ===
                                    'pending',
                                'text-red-500 font-semibold':
                                    userData.invitation_details.status ===
                                    'rejected',
                            }"
                        >
                            {{ userData.invitation_details.status }}
                        </span>
                    </p>
                    <p class="mb-2">
                        <span
                            class="font-semibold"
                            v-if="
                                userData.invitation_details.status ===
                                'accepted'
                            "
                        >
                            Accepted at:
                        </span>
                        <span
                            class="text-green-500"
                            v-if="
                                userData.invitation_details.status ===
                                'accepted'
                            "
                        >
                            {{ userData.invitation_details.accepted_at }}
                        </span>
                        <span
                            v-if="
                                userData.invitation_details.status === 'pending'
                            "
                            class="font-semibold"
                        >
                            Valid till:
                        </span>
                        <span
                            class="text-yellow-500"
                            v-if="
                                userData.invitation_details.status === 'pending'
                            "
                        >
                            {{ userData.invitation_details.valid_till }}
                        </span>
                    </p>
                    <p class="mb-2">
                        <span class="font-semibold"
                            >Access Control (Role):</span
                        >
                        {{ userData.access_control }}
                    </p>

                    <p class="mb-2">
                        <span class="font-semibold">Default Facility:</span>
                        {{ userData.facility }}
                    </p>
                </div>

                <!-- Job Description and Additional Details -->
                <div
                    class="bg-gray-200 rounded-lg p-6 text-xl col-span-3 md:col-span-2 lg:col-span-2"
                >
                    <h2 class="text-2xl font-semibold mb-4">
                        Job Description and Additional Details
                    </h2>
                    <p class="mb-2">
                        <span class="font-semibold">Job Description:</span>
                        {{ userData.info }}
                    </p>
                    <p class="mb-2">
                        <span class="font-semibold">Additional Details:</span>
                        {{ userData.additional_details }}
                    </p>
                    <p class="mb-2">
                        <span class="font-semibold">Default Warehouse:</span>
                        {{ userData.warehouse }}
                    </p>
                    <p class="mb-2">
                        <span class="font-semibold">Provider Type:</span>
                        {{ userData.provider_type }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DashboardLayout from "../../layouts/DashboardLayout";
import i18n from "../../i18n";

export default {
    layout: DashboardLayout,
    props: {
        userData: Object, // Pass the user data as a prop
    },

    data() {
        return {
            activeLink: i18n.t("userProfile"),
        };
    },
    methods: {
        editLink() {
            console.log(this.userData.id);
            return this.route("dashboard.users.edit", this.userData.id);
        },
    },
};
</script>

<style>
/* Add custom styles here if needed */
</style>
