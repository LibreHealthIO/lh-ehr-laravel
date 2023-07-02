<template>
    <div class="flex min-h-screen bg-white py-8 px-4">
        <div class="w-1/3 mx-auto bg-white rounded shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Add Role</h2>
            <form @submit.prevent="addRole" method="post">
                <div class="mb-4">
                    <ehr-input
                        v-model="roleForm.name"
                        :error="errors.name"
                        :label="'Role Name'"
                        :placeholder="'Enter Role Name'"
                        required
                    />
                </div>
                <div class="mb-4">
                    <ehr-input
                        v-model="roleForm.display_name"
                        :error="errors.display_name"
                        :label="'Display Name'"
                        :placeholder="'Enter Role Display Name'"
                        required
                    />
                </div>
                <div class="mb-4">
                    <ehr-input
                        v-model="roleForm.description"
                        :error="errors.description"
                        :label="'Role Description'"
                        :placeholder="'Enter Role Description'"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2" for="permissions"
                        >Permissions</label
                    >
                    <div class="relative">
                        <div
                            v-if="roleForm.permissions.length > 0"
                            class="flex flex-wrap items-center mb-2"
                        >
                            <span
                                v-for="permission in roleForm.permissions"
                                :key="permission.id"
                                class="bg-orange-500 text-white rounded-full px-2 py-1 mr-2 mb-2"
                            >
                                {{ permission.display_name }}
                            </span>
                        </div>

                        <button
                            id="permissions-dropdown"
                            class="w-full px-4 py-2 rounded ring-2"
                            type="button"
                            @click="togglePermissionList()"
                        >
                            Select Permissions

                            <span
                                :class="{
                                    'transform rotate-180':
                                        permission_dropdown === true,
                                }"
                                class="inline-block transition-transform duration-300"
                            >
                                &#9662;
                            </span>
                        </button>

                        <ul
                            v-if="permission_dropdown === true"
                            class="absolute mt-2 py-2 bg-white rounded-md shadow-lg z-10 max-h-72 overflow-y-auto no-scrollbar"
                        >
                            <li
                                v-for="permission in permissions"
                                :key="permission.id"
                                @click="selectPermission(permission)"
                                class="px-4 py-2 hover:bg-gray-100 cursor-pointer w-full"
                            >
                                {{ permission.display_name }} @{{
                                    permission.name
                                }}
                            </li>
                        </ul>
                    </div>
                </div>
                <button
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
                    Add Role
                </button>
            </form>
        </div>

        <div
            class="w-2/3 mx-auto bg-white rounded shadow-md p-6 pb-60 overflow-auto no-scrollbar"
        >
            <h2 class="text-2xl font-bold mb-4">Existing Roles</h2>
            <div class="grid grid-cols-2 gap-4">
                <div
                    v-for="role in roles"
                    :key="role.id"
                    class="bg-white rounded-md p-4 shadow-lg grid grid-cols-2 gap-4"
                >
                    <div>
                        <h3 class="text-lg font-bold">
                            {{ role.display_name }}
                        </h3>
                        <p class="text-gray-500">@{{ role.name }}</p>
                        <p class="text-gray-500">
                            Desc: {{ role.description }}
                        </p>
                        <div class="mt-2">
                            <div class="relative inline-block">
                                <button
                                    @click="toggleDropdown(role.id)"
                                    class="inline-block px-1 py-1 mb-2 font-bold text-orange-400 mr-2"
                                >
                                    <span class="mr-1"
                                        >{{
                                            role.permissions.length
                                        }}
                                        Permissions</span
                                    >
                                    <span
                                        :class="{
                                            'transform rotate-180':
                                                openDropdown === role.id,
                                        }"
                                        class="inline-block transition-transform duration-300"
                                    >
                                        &#9662;
                                    </span>
                                </button>
                                <ul
                                    v-if="openDropdown === role.id"
                                    class="absolute right-0 mt-2 py-2 bg-white rounded-md shadow-lg z-10 max-h-56 overflow-y-scroll no-scrollbar"
                                >
                                    <li
                                        v-for="permission in role.permissions"
                                        :key="permission.id"
                                        class="px-4 py-2 hover:bg-gray-100 cursor-pointer w-auto"
                                    >
                                        {{ permission.name }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-gray-500">
                            {{ role.users.length }} Users
                        </h4>

                        <ul>
                            <li
                                v-for="user in role.users.slice(0, 5)"
                                :key="user.id"
                                class="text-gray-500 font-bold"
                            >
                                {{ user.first_name }} {{ user.last_name }}
                            </li>
                        </ul>

                        <div class="flex items-end bottom-0 right-0">
                            <a
                                :href="
                                    route('dashboard.roles.details', role.id)
                                "
                            >
                                <button
                                    class="inline-block px-1 py-1 mb-2 font-bold text-blue-400"
                                >
                                    More Details >>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import DashboardLayout from "../layouts/DashboardLayout";
export default {
    name: "Roles",
    layout: DashboardLayout,
    props: {
        errors: Object,
    },
    data() {
        return {
            openDropdown: null,
            userDropdown: null,
            permission_dropdown: null,
            name: "",
            display_name: "",
            description: "",
            permissions: [],
            roles: [],
            roleForm: this.$inertia.form({
                name: null,
                display_name: null,
                description: null,
                permissions: [],
            }),
        };
    },
    mounted() {
        this.getRoles();
        this.getPermissions();
    },
    methods: {
        getRoles() {
            axios.get(this.route("dashboard.roles.all")).then((response) => {
                this.roles = response.data;
            });
        },
        getPermissions() {
            axios
                .get(this.route("dashboard.permissions.all"))
                .then((response) => {
                    this.permissions = response.data;
                });
        },
        addRole() {
            this.roleForm.post(this.route("dashboard.roles.store"));
        },
        selectPermission(permission) {
            if (!this.roleForm.permissions.includes(permission)) {
                this.roleForm.permissions.push(permission);
            }
        },
        toggleDropdown(roleId) {
            this.openDropdown = this.openDropdown === roleId ? null : roleId;
        },
        toggleUserDropdown(roleId) {
            this.userDropdown = this.userDropdown === roleId ? null : roleId;
        },
        togglePermissionList() {
            this.permission_dropdown = !this.permission_dropdown;
        },
    },

    created() {
        this.$on("submit", this.addRole);
    },
};
</script>
