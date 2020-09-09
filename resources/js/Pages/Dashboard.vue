<template>
    <layout>
        <Breadcrumb :active-link="activeLink"/>
        <h1 class="text-2xl font-light mb-3">Welcome
            <span class="text-teal-400">{{ $page.auth.user.first_name }} {{ $page.auth.user.last_name }}</span></h1>
        <div class="min-w-screen flex flex-col items-center px-5 py-5">
            <div class="w-full max-w-3xl">
                <div class="-mx-2 md:flex">
                    <div class="w-full md:w-1/3 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Encounters</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ encounters_count }}</h3>
                                </div>
                                <div class="absolute hover:text-4xl hover:bg-red-200 bottom-0 px-2 py-2 inset-x-0">
                                    <svg class="h-12 w-12 text-orange-200 hover:bg-red-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Patients/Clients</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ patients_count }}</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <svg class="h-12 w-12 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Inventory</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">8,028</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <svg class="h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-3xl">
                <div class="-mx-2 md:flex">
                    <div class="w-full md:w-1/3 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Users</h4>
                                    <h3 class="text-3xl text-gray-500 font-semibold leading-tight my-3">{{ users_count }}</h3>
                                </div>
                                <div class="absolute hover:text-4xl hover:bg-red-200 bottom-0 px-2 py-2 inset-x-0">
                                    <svg class="h-12 w-12 text-green-400 hover:bg-red-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Reports</h4>
                                    <h3 class="text-3xl text-gray-500 font-semibold leading-tight my-3">11,427</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <svg class="h-12 w-12 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Facilities</h4>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ facilities_count}}</h3>
                                </div>
                                <div class="absolute hover:text-4xl bottom-0 px-2 py-2 inset-x-0">
                                    <svg class="h-12 w-12 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>
<script>
    import Layout from "~/Shared/Layout";
    import Breadcrumb from "~/components/Breadcrumb";
    import i18n from '~/i18n'

    let title = i18n.t('general.dashboard');
    export default {
        name: "dashboard",
        metaInfo: { title: title },
        props: [
            'users_count',
            'patients_count',
            'facilities_count',
            'encounters_count',
        ],
        data: () => {
            return {
                activeLink: title,
            };
        },
        components: {
            Layout,
            Breadcrumb
        }
    }
</script>
