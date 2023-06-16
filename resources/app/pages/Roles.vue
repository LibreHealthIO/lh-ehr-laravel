<template>
    <div class="flex min-h-screen bg-white py-8 px-4">
        <div class="w-1/2 mx-auto bg-white rounded shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Add Role</h2>
            <form @submit.prevent="addRole">
                <div class="mb-4">
                    <label class="block font-bold mb-2" for="name">Name</label>
                    <input
                        v-model="name"
                        type="text"
                        id="name"
                        class="w-full px-4 py-2 rounded ring-2 ring-orange-500 focus:ring-orange-500"
                    />
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2" for="name"
                        >Display Name</label
                    >
                    <input
                        v-model="display_name"
                        type="text"
                        id="display_name"
                        class="w-full px-4 py-2 rounded ring-2 ring-orange-500 focus:ring-orange-500"
                    />
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2" for="description"
                        >Description</label
                    >
                    <input
                        v-model="description"
                        id="description"
                        rows="4"
                        class="w-full px-4 py-2 rounded ring-2 ring-orange-500 focus:ring-orange-500"
                    />
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2" for="permissions"
                        >Permissions</label
                    >
                    <select
                        v-model="selectedPermissions"
                        multiple
                        id="permissions"
                        class="w-full px-4 py-2 rounded ring-2 ring-orange-500 focus:ring-orange-500"
                    >
                        <option
                            v-for="permission in permissions"
                            :key="permission.id"
                            :value="permission.id"
                        >
                            {{ permission.name }}
                        </option>
                    </select>
                </div>
                <button
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
                    Add Role
                </button>
            </form>
        </div>

        <div class="w-1/2 mx-auto bg-white rounded shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Existing Roles</h2>
            <div class="grid grid-cols-2 gap-4">
                <div
                    v-for="role in roles"
                    :key="role.id"
                    class="bg-white rounded-md p-4 shadow-lg"
                >
                    <h3 class="text-lg font-bold">{{ role.display_name }}</h3>
                    <p class="text-gray-500">@{{ role.name }}</p>
                    <p class="text-gray-500">{{ role.description }}</p>
                    <div class="mt-2">
                        <p class="font-bold">Permissions:</p>
                        <span
                            v-for="permission in role.permissions"
                            :key="permission.id"
                            class="inline-block bg-orange-100 rounded-full px-3 py-1 mb-2 text-xs font-semibold mr-2"
                            >{{ permission.name }}</span
                        >
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

    data() {
        return {
            name: "",
            display_name: "",
            description: "",
            permissions: [
                { id: 1, name: "Permission 1" },
                { id: 2, name: "Permission 2" },
                { id: 3, name: "Permission 3" },
            ],
            selectedPermissions: [],
            roles: [
                {
                    id: 1,
                    name: "Admin",
                    description: "Can do everything",
                    permissions: [
                        "create_posts",
                        "edit_posts",
                        "delete_posts",
                        "create_roles",
                    ],
                },
                {
                    id: 2,
                    name: "User",
                    description: "Can view and create",
                    permissions: ["create_posts", "view_posts"],
                },
            ],
        };
    },
    mounted() {
        this.getRoles();
    },
    methods: {
        getRoles() {
            axios.get(this.route("dashboard.roles.all")).then((response) => {
                this.roles = response.data;
            });
        },
        addRole() {
            axios
                .post(this.route("dashboard.roles.store"), {
                    name: this.name,
                    display_name: this.display_name,
                    description: this.description,
                })
                .then((response) => {
                    console.log(response);
                    this.roles.push(response.data);
                    this.name = "";
                    this.description = "";
                    this.permissions = [];
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        // deleteRole(id) {
        //     axios
        //         .delete(`/roles/${id}`)
        //         .then((response) => {
        //             this.roles = this.roles.filter((role) => role.id !== id);
        //         })
        //         .catch((error) => {
        //             console.log(error);
        //         });
        // },
    },
    created() {
        this.$on("submit", this.addRole);
    },
};
</script>
