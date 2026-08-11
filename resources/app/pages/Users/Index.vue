<template>
    <div class="container mx-auto">
        <Breadcrumb :active-link="activeLink" />
        <div class="flex justify-center">
            <h2 class="text-2xl font-bold mb-4">User Details</h2>
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
        users: Array,
        facilities: Object,
    },
    data() {
        return {
            url: "",
            activeLink: i18n.t("users"),
        };
    },
    computed: {
        columns() {
            return [
                { label: "ID", name: "id", orderable: true },
                { label: "Suffix", name: "suffix", orderable: true },
                { label: "First Name", name: "first_name", orderable: true },
                { label: "Middle Name", name: "middle_name", orderable: true },
                { label: "Last Name", name: "last_name", orderable: true },
                {
                    label: "Username",
                    name: "username",
                    orderable: true,
                    transform: ({ data, name }) => {
                        const userId = data.id;

                        return `<a href="${route("dashboard.users.show", {
                            id: userId,
                        })}" class="text-blue-500 hover:underline">${
                            data.username
                        }</a>`;
                    },
                },
                { label: "License", name: "license", orderable: true },
                {
                    label: "Provider Type",
                    name: "provider_type",
                    orderable: true,
                },
                { label: "Warehouse", name: "warehouse", orderable: true },
                { label: "Facility", name: "facility", orderable: true },
                {
                    label: "Additional Details",
                    name: "additional_details",
                    orderable: true,
                },
                {
                    label: "Federal Tax ID",
                    name: "federal_tax_id",
                    orderable: true,
                },
                {
                    label: "Federal Drug ID",
                    name: "federal_drug_id",
                    orderable: true,
                },
                { label: "Taxonomy", name: "taxonomy", orderable: true },
                { label: "NPI", name: "npi", orderable: true },
                { label: "Info", name: "info", orderable: true },
                {
                    label: "Access Control",
                    name: "access_control",
                    orderable: true,
                },
            ];
        },
    },
    mounted() {
        this.url = route("dashboard.users.fetch");
    },
};
</script>

<style></style>
