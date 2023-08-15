<template>
    <div class="min-h-screen bg-white py-4 px-4">
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink" />
        <div
            class="w-1/2 mx-auto bg-white rounded shadow-md p-6 overflow-y-auto no-scrollbar"
        >
            <h2 class="text-2xl font-bold mb-4">Edit User</h2>
            <form @submit.prevent="updateUser" method="post">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <ehr-input
                            v-model="userForm.username"
                            :error="errors.username"
                            :label="'Username'"
                            :placeholder="'Enter Username'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.email"
                            :error="errors.email"
                            :label="'Email'"
                            :placeholder="'Enter Email'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.tax_id"
                            :label="'Tax ID'"
                            :placeholder="'Enter Tax ID'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.suffix"
                            :label="'Suffix'"
                            :placeholder="'Enter Suffix'"
                        />
                    </div>

                    <div>
                        <ehr-input
                            v-model="userForm.first_name"
                            :error="errors.first_name"
                            :label="'First Name'"
                            :placeholder="'Enter First Name'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.middle_name"
                            :error="errors.middle_name"
                            :label="'Middle Name'"
                            :placeholder="'Enter Middle Name'"
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.last_name"
                            :error="errors.last_name"
                            :label="'Last Name'"
                            :placeholder="'Enter Last Name'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.dea_number"
                            :label="'DEA Number'"
                            :placeholder="'Enter DEA Number'"
                            required
                        />
                    </div>

                    <div>
                        <ehr-input
                            v-model="userForm.npi"
                            :label="'NPI'"
                            :placeholder="'Enter NPI'"
                            required
                        />
                    </div>

                    <div>
                        <ehr-input
                            v-model="userForm.taxonomy"
                            :label="'Taxonomy'"
                            :placeholder="'Enter Taxonomy'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.license_number"
                            :label="'License No.'"
                            :placeholder="'Enter License No.'"
                            required
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.provider_type"
                            :label="'Provider Type'"
                            :placeholder="'Enter Provider Type'"
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.default_warehouse"
                            :label="'Default Warehouse'"
                            :placeholder="'Enter Default Warehouse'"
                        />
                    </div>
                    <div>
                        <ehr-input
                            v-model="userForm.job_description"
                            :label="'Job Description'"
                            :placeholder="'Enter Job Description'"
                        />
                    </div>
                    <div>
                        <button
                            id="default-facility-dropdown"
                            class="w-full px-4 py-2 rounded ring-2"
                            type="button"
                            @click="toggleDefaultFacilityList()"
                        >
                            Default Facility:
                            <b>{{ userForm.default_facility }}</b>

                            <span
                                :class="{
                                    'transform rotate-180':
                                        default_facility_dropdown === true,
                                }"
                                class="inline-block transition-transform duration-300"
                            >
                                &#9662;
                            </span>
                        </button>

                        <ul
                            v-if="default_facility_dropdown === true"
                            class="absolute w-72 mt-2 py-2 bg-white rounded-md shadow-lg z-10 max-h-72 overflow-y-auto no-scrollbar"
                        >
                            <li
                                v-for="facility in facilities"
                                :key="facility.id"
                                @click="selectDefaultFacility(facility)"
                                class="px-4 py-2 hover:bg-gray-100 cursor-pointer w-full"
                            >
                                {{ facility }}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <button
                            id="role-dropdown"
                            class="w-full px-4 py-2 rounded ring-2"
                            type="button"
                            @click="toggleRoleList()"
                        >
                            Role: <b> {{ userForm.role }}</b>

                            <span
                                :class="{
                                    'transform rotate-180':
                                        role_dropdown === true,
                                }"
                                class="inline-block transition-transform duration-300"
                            >
                                &#9662;
                            </span>
                        </button>

                        <ul
                            v-if="role_dropdown === true"
                            class="absolute w-72 mt-2 py-2 bg-white rounded-md shadow-lg z-10 max-h-72 overflow-y-auto no-scrollbar"
                        >
                            <li
                                v-for="role in roleOptions"
                                :key="role.id"
                                @click="selectRole(role)"
                                class="px-4 py-2 hover:bg-gray-100 cursor-pointer w-full"
                            >
                                {{ role.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-2">
                        <button
                            type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-orange-500"
                        >
                            Edit User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import DashboardLayout from "../../layouts/DashboardLayout";
import i18n from "../../i18n";
export default {
    layout: DashboardLayout,
    props: {
        facilities: Object,
        userData: Object,
    },
    data() {
        return {
            role_dropdown: null,
            default_facility_dropdown: false,
            userForm: this.$inertia.form({
                // Initialize the form fields with userData
                username: this.userData.username,
                email: this.userData.email,
                suffix: this.userData.suffix,
                first_name: this.userData.first_name,
                middle_name: this.userData.middle_name,
                last_name: this.userData.last_name,
                dea_number: this.userData.federal_drug_id,
                tax_id: this.userData.federal_tax_id,
                npi: this.userData.npi.toString(),
                job_description: this.userData.info,
                provider_type: this.userData.provider_type,
                default_warehouse: this.userData.warehouse,
                taxonomy: this.userData.taxonomy.toString(),
                license_number: this.userData.license,
                additional_details: this.userData.additional_details,
                default_facility: this.userData.facility,
                role: this.userData.access_control,
            }),
            errors: {
                username: "",
                full_name: "",
            },
            roleOptions: [],

            pagesRoutes: [
                {
                    title: i18n.t("user/invitations"),
                    link: this.route("dashboard.users.index"),
                },
                {
                    title:
                        this.userData.first_name +
                        " " +
                        this.userData.last_name,
                    link: this.route("dashboard.users.show", this.userData.id),
                },
            ],
            activeLink: i18n.t("edit"),
        };
    },
    mounted() {
        this.getRoles();
    },
    methods: {
        getRoles() {
            axios.get(this.route("dashboard.roles.all")).then((response) => {
                this.roleOptions = response.data;
            });
        },
        updateUser() {
            console.log(this.userForm);
            this.userForm.put(
                this.route("dashboard.users.update", this.userData.id)
            );
        },
        selectDefaultFacility(facility) {
            this.userForm.default_facility = facility;
            this.default_facility_dropdown = false;
        },
        selectRole(role) {
            this.userForm.role = role.name;
            this.role_dropdown = false;
        },
        toggleRoleList() {
            this.role_dropdown = !this.role_dropdown;
        },
        toggleDefaultFacilityList() {
            this.default_facility_dropdown = !this.default_facility_dropdown;
        },
    },
};
</script>
