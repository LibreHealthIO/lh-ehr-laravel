<template>
    <div class="container mx-auto">
        <div class="flex justify-center">
            <h2 class="text-2xl font-bold mb-4">Invitation Details</h2>
        </div>

        <!-- Facility Filter -->
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-700"
                >Filter by Facility:</label
            >
            <select
                v-model="selectedFacility"
                class="w-full px-4 py-2 border rounded-md"
            >
                <option value="">All Facilities</option>
                <option
                    v-for="facility in uniqueFacilities"
                    :key="facility"
                    :value="facility"
                >
                    {{ facility }}
                </option>
            </select>
        </div>

        <table class="w-full border-collapse">
            <!-- Table Headers -->
            <thead>
                <tr>
                    <th class="p-4 bg-gray-200">Invitation ID</th>
                    <th class="p-4 bg-gray-200">Name</th>
                    <th class="p-4 bg-gray-200">Email</th>
                    <th class="p-4 bg-gray-200">Facility</th>
                    <th class="p-4 bg-gray-200">Role</th>
                    <th class="p-4 bg-gray-200">Status</th>
                    <th class="p-4 bg-gray-200">Additional Info</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table Rows -->
                <tr
                    v-for="invitation in filteredInvitations"
                    :key="invitation.id"
                >
                    <td class="p-4 border">{{ invitation.id }}</td>
                    <td class="p-4 border">
                        {{ invitation.user.first_name }}
                        {{ invitation.user.last_name }}
                    </td>
                    <td class="p-4 border">{{ invitation.email }}</td>
                    <td class="p-4 border">{{ invitation.facility }}</td>
                    <td class="p-4 border">
                        {{ invitation.user.access_control }}
                    </td>
                    <td class="p-4 border">
                        <span
                            :class="{
                                'text-green-500':
                                    invitation.status === 'accepted',
                                ' text-red-500':
                                    invitation.status === 'rejected',
                                ' text-yellow-500':
                                    invitation.status === 'pending',
                            }"
                            class="px-2 py-1 rounded"
                        >
                            {{ invitation.status }}
                        </span>
                    </td>
                    <td class="p-4 border">
                        <span
                            v-if="invitation.status === 'accepted'"
                            class="text-green-500 px-2 py-1 rounded"
                        >
                            Accepted at: {{ invitation.accepted_at }}
                        </span>
                        <span
                            v-if="invitation.status === 'pending'"
                            class="text-yellow-500 px-2 py-1 rounded"
                        >
                            Valid till: {{ invitation.valid_till }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import DashboardLayout from "../layouts/DashboardLayout";
export default {
    layout: DashboardLayout,
    props: {
        invitations: Array, // Get the invitations data from the controller
    },
    data() {
        return {
            selectedFacility: "", // Holds the selected facility for filtering
        };
    },
    computed: {
        // Get a list of unique facilities from the invitations data
        uniqueFacilities() {
            console.log(this.invitations);
            return [
                ...new Set(
                    this.invitations.map((invitation) => invitation.facility)
                ),
            ];
        },
        // Filter the invitations based on the selected facility
        filteredInvitations() {
            if (this.selectedFacility === "") {
                // If no facility selected, show all invitations
                return this.invitations;
            } else {
                // Filter the invitations based on the selected facility
                return this.invitations.filter(
                    (invitation) =>
                        invitation.facility === this.selectedFacility
                );
            }
        },
    },
};
</script>

<style></style>
