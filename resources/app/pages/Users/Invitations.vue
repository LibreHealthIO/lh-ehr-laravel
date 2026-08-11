<template>
    <div class="container mx-auto">
        <Breadcrumb :active-link="activeLink" />
        <div class="flex justify-center">
            <h2 class="text-2xl font-bold mb-4">Invitation Details</h2>
        </div>

        <div class="flex justify-end">
            <inertia-link :href="route('dashboard.users.create')">
            <button class="bg-gray-900 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow ml-auto">
              Add User
            </button>
        </inertia-link>
        </div>

        <data-table :columns="columns" :url="url">
            <div
                class="flex justify-between mb-2"
                slot="filters"
                slot-scope="{ tableFilters, perPage }"
            >
                <div class="w-1/2 mr-5">
                    <label class="block mb-2 text-sm font-medium text-gray-700"
                        >Filter by Facility:</label
                    >
                    <select
                        v-model="tableFilters.filters.facility"
                        class="w-full px-4 py-2 border rounded-md"
                    >
                        <option :value="null">All Facilities</option>
                        <option
                            v-for="facility in facilities"
                            :key="facility"
                            :value="facility"
                        >
                            {{ facility }}
                        </option>
                    </select>
                </div>
                <div class="w-1/2">
                    <label class="block mb-2 text-sm font-medium text-gray-700"
                        >Rows Per Page:</label
                    >
                    <select
                        v-model="tableFilters.length"
                        class="w-full px-4 py-2 border rounded-md"
                    >
                        <option :key="page" v-for="page in perPage">
                            {{ page }}
                        </option>
                    </select>
                </div>
            </div>
            <div
                class="flex justify-center mt-4"
                slot="pagination"
                slot-scope="{ links = {}, meta = {} }"
            >
                <div class="flex items-center">
                    <nav>
                        <div class="inline-flex">
                            <div class="mr-4 mt-2">
                                <span class="text-gray-600">
                                    Showing {{ meta.from }} to {{ meta.to }} of
                                    {{ meta.total }} Entries
                                </span>
                            </div>
                            <div>
                                <button
                                    :disabled="!links.prev"
                                    class="px-4 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                                    @click="url = links.prev"
                                >
                                    Prev
                                </button>
                                <button
                                    :disabled="!links.next"
                                    class="ml-2 px-4 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                                    @click="url = links.next"
                                >
                                    Next
                                </button>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </data-table>
    </div>
</template>

<script>
import DashboardLayout from "../../layouts/DashboardLayout";
import i18n from "../../i18n";
export default {
    layout: DashboardLayout,
    props: {
        facilities: Object,
    },
    data() {
        return {
            filters: {
                facility: null,
            },
            url: "",
            activeLink: i18n.t("users/invitations"),
        };
    },
    computed: {
        columns() {
            return [
                { label: "Invitation ID", name: "id", orderable: true },
                {
                    label: "Name",
                    name: "user.first_name",
                    transform: ({ data, name }) => {
                        const userId = data.user.id;
                        const fullName = `${data.user.first_name} ${data.user.last_name}`;
                        return `<a href="${route("dashboard.users.show", {
                            id: userId,
                        })}" class="text-blue-500 hover:underline">${fullName}</a>`;
                    },
                },
                { label: "Email", name: "email", orderable: true },
                { label: "Facility", name: "facility", orderable: true },
                { label: "Role", name: "user.access_control" },
                {
                    label: "Status",
                    name: "status",
                    transform: ({ data, name }) => {
                        const status = data[name];
                        let className = "";
                        if (status === "accepted") className = "text-green-500";
                        else if (status === "rejected")
                            className = "text-red-500";
                        else if (status === "pending")
                            className = "text-yellow-500";
                        return `<span class="px-2 py-1 rounded ${className}">${status}</span>`;
                    },
                },
                {
                    label: "Additional Info",
                    name: "status_info",
                    transform: ({ data, name }) => {
                        const status = data.status;
                        if (status === "accepted") {
                            return `<span class="text-green-500 px-2 py-1 rounded">Accepted at: ${data.accepted_at}</span>`;
                        } else if (status === "pending") {
                            return `<span class="text-yellow-500 px-2 py-1 rounded">Valid till: ${data.valid_till}</span>`;
                        }
                        return "";
                    },
                },
            ];
        },
    },
    mounted() {
        this.url = route("dashboard.invitations.fetch");
    },
};
</script>

<style></style>
