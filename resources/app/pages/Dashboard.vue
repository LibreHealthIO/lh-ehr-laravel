<template>
    <div>
        <Breadcrumb :active-link="activeLink"/>
        <div class="flex flex-col px-5 py-5">
            <h1 class="text-2xl font-bold text-center mb-3">
                Welcome back,
                <span class="text-teal-400">
                    {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}
                </span>
            </h1>

            <div class="w-full items-center justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4 lg:gap-6 p-5 mx-10 py-5 md:mx-60 md:py-10 ">
                    <a :href="'#'" class="cursor-pointer">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Encounters</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">0</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <icon name="calendar" class="w-12 h-12 text-theme-1"/>
                                </div>
                            </div>
                        </div>
                    </a>
                    <inertia-link :href="route('dashboard.patients.index')" class="cursor-pointer">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Patients/Clients</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ patients_count }}</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <icon name="users" class="w-12 h-12"/>
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                    <a :href="'#'" class="cursor-pointer">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Inventory</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">8,028</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <icon name="wrench-screwdriver" class="w-12 h-12"/>
                                </div>
                            </div>
                        </div>
                    </a>
                    <inertia-link :href="route('dashboard.users.index')" class="cursor-pointer">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Users</h4>
                                    <h3 class="text-3xl text-gray-500 font-semibold leading-tight my-3">{{ users_count }}</h3>
                                </div>
                                <div class="absolute hover:text-4xl hover:bg-red-200 bottom-0 px-2 py-2 inset-x-0">
                                    <icon name="users" class="w-12 h-12"/>
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                    <a :href="'#'" class="cursor-pointer">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Reports</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">5,600</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <icon name="document-text" class="w-12 h-12 text-orange-600"/>
                                </div>
                            </div>
                        </div>
                    </a>
                    <inertia-link :href="route('dashboard.facilities.index')" class="cursor-pointer">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Facilities</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ facilities_count}}</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <icon name="facility" class="h-12 w-12 text-indigo-500"/>
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import DashboardLayout from "../layouts/DashboardLayout"
    import i18n from "../i18n";

    export default {
        name: "dashboard",
        layout: DashboardLayout,
        metaInfo: {
            title: i18n.t('general.dashboard')
        },
        props: {
            'users_count': Number,
            'patients_count': Number,
            'facilities_count': Number,
            'encounters_count': Number,
        },
        data() {
            return {
                activeLink: i18n.t('general.dashboard'),
            };
        },
    }
</script>
