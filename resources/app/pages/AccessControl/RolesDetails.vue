<template>
    <div class="flex justify-center h-screen">
        <div class="w-full max-w-screen-xl p-4">
            <div class="flex justify-center">
                <h2 class="text-2xl font-bold mb-4">Role Details</h2>
            </div>

            <div class="bg-white rounded-md shadow-lg p-4">
                <div class="flex flex-col justify-center items-center">
                    <h3 class="text-lg font-bold">
                        {{ roleDetails.display_name }}
                    </h3>
                    <p class="text-gray-500">@{{ roleDetails.name }}</p>
                    <p class="text-gray-500">
                        Description: {{ roleDetails.description }}
                    </p>
                </div>
                <div class="grid grid-cols-2">
                    <div class="mt-6">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100">
                                        Permissions
                                    </th>
                                </tr>
                            </thead>
                            <div
                                class="max-h-96 overflow-y-scroll no-scrollbar border-r-8"
                            >
                                <tbody>
                                    <tr
                                        v-for="permission in roleDetails.permissions"
                                        :key="permission.id"
                                    >
                                        <td class="py-2 px-4">
                                            {{ permission.name }}
                                        </td>
                                    </tr>
                                </tbody>
                            </div>
                        </table>
                    </div>

                    <div class="mt-6">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100">Users</th>
                                </tr>
                            </thead>
                            <div
                                class="max-h-96 overflow-y-scroll no-scrollbar"
                            >
                                <tbody>
                                    <tr
                                        v-for="user in roleDetails.users"
                                        :key="user.id"
                                    >
                                        <td class="py-2 px-4">
                                            {{ user.first_name }}
                                            {{ user.last_name }}
                                        </td>
                                        <td class="py-2 px-4">
                                            {{ user.email }}
                                        </td>
                                    </tr>
                                </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DashboardLayout from "../../layouts/DashboardLayout";
export default {
    layout: DashboardLayout,
    props: {
        roleDetails: {
            type: Object,
        },
    },
    methods: {
        editRole() {
            // Handle edit role logic
        },
        deleteRole() {
            // Handle delete role logic
        },
    },
};
</script>

<style scoped>
/* Add custom styles as needed */
</style>
