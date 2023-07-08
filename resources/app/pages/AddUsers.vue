<template>
    <div class="flex min-h-screen bg-white py-8 px-4">
        <div
            class="w-1/2 mx-auto bg-white rounded shadow-md p-6 overflow-y-auto no-scrollbar"
        >
            <h2 class="text-2xl font-bold mb-4">Add User</h2>
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
                        v-model="userForm.tax_id"
                        :label="'Tax ID'"
                        :placeholder="'Enter Tax ID'"
                    />
                </div>
                <ehr-input
                    v-model="userForm.password"
                    :error="errors.password"
                    :label="'Password'"
                    :placeholder="'Enter Password'"
                    type="password"
                    required
                ></ehr-input>

                <ehr-input
                    v-model="userForm.confirmPassword"
                    :error="errors.confirmPassword"
                    :label="'Confirm Password'"
                    :placeholder="'Confirm Password'"
                    type="password"
                    required
                ></ehr-input>
                <div>
                    <ehr-input
                        v-model="userForm.suffix"
                        :label="'Suffix'"
                        :placeholder="'Enter Suffix'"
                    />
                </div>
                <div>
                    <ehr-input
                        v-model="userForm.full_name"
                        :error="errors.full_name"
                        :label="'Full Name'"
                        :placeholder="'Enter Full Name'"
                        required
                    />
                </div>
                <div>
                    <ehr-input
                        v-model="userForm.dea_number"
                        :label="'DEA Number'"
                        :placeholder="'Enter DEA Number'"
                    />
                </div>

                <div>
                    <ehr-input
                        v-model="userForm.npi"
                        :label="'NPI'"
                        :placeholder="'Enter NPI'"
                    />
                </div>

                <div>
                    <ehr-input
                        v-model="userForm.taxonomy"
                        :label="'Taxonomy'"
                        :placeholder="'Enter Taxonomy'"
                    />
                </div>
                <div>
                    <ehr-input
                        v-model="userForm.license_number"
                        :label="'License No.'"
                        :placeholder="'Enter License No.'"
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
                    <ehr-input
                        v-model="userForm.additional_details"
                        :label="'Additional Details'"
                        :placeholder="'Enter Additional Details'"
                    />
                </div>
                <div>
                    <ehr-dropdown
                        v-model="userForm.default_facility"
                        :options="facilityOptions"
                        :label="'Default Facility'"
                        :placeholder="'Select Default Facility'"
                    />
                </div>
                <div>
                    <ehr-dropdown
                        v-model="userForm.role"
                        :options="roleOptions"
                        :label="'Role'"
                        :placeholder="'Select Role'"
                    />
                </div>
                <div>
                    <button
                        id="default-facility-dropdown"
                        class="w-full px-4 py-2 rounded ring-2"
                        type="button"
                        @click="toggleDefaultFacilityList()"
                    >
                        Default Facility

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
                            v-for="facility in facilityOptions"
                            :key="facility.id"
                            @click="selectDefaultFacility(facility)"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer w-full"
                        >
                            {{ facility.name }}
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
                        Role

                        <span
                            :class="{
                                'transform rotate-180': role_dropdown === true,
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
                        Add User
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            role_dropdown: null,
            default_facility_dropdown: false,
            userForm: {
                username: "",
                password: "",
                confirmPassword: "",
                suffix: "",
                full_name: "",
                dea_number: "",
                tax_id: "",
                npi: "",
                provider_type: "",
                default_warehouse: "",
                taxonomy: "",
                license_number: "",
                additional_details: "",
                default_facility: "",
                role: "",
            },
            errors: {
                username: "",
                full_name: "",
            },
            facilityOptions: [
                {
                    id: 1,
                    name: "Facility 1",
                },
                {
                    id: 2,
                    name: "Facility 2",
                },
                {
                    id: 3,
                    name: "Facility 3",
                },
            ],
            roleOptions: [],
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
        addUser() {},
        toggleRoleList() {
            this.role_dropdown = !this.role_dropdown;
        },
        toggleDefaultFacilityList() {
            this.default_facility_dropdown = !this.default_facility_dropdown;
        },
    },
};
</script>
