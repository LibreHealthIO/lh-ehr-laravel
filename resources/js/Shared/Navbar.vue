<template>
    <header class="h-24 text-gray-100 bg-gray-900 body-font shadow w-full fixed pin-t z-50">
        <div class="p-2 flex-col items-center pt-20">
            <nav class="flex flex-wrap items-center text-base md:ml-0">
                <inertia-link :href="route('dashboard.calendar')"
                :class="isActiveClass('dashboard.calendar')">{{ $t('menu.calendar') }}</inertia-link>
                <inertia-link :href="route('dashboard.flow_board')"
                :class="isActiveClass('dashboard.flow_board')">{{ $t('menu.flow_board') }}</inertia-link>

                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.patient_client') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Finder
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Add New/Search
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Recycle Bin
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Summary
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Track Appointments
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Visits
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Records
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Visit Forms
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Imports
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.fees') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Fee Sheet
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Payment
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Checkout
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Billing
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Posting
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Batch Payments
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Verify Patient Data
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">EDI History
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.inventory') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Management
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Destroyed
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.procedures') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Providers
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Configuration
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Load Compendium
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Pending Review
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Patient Results
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Lab Results
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Electronic Reports
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Lab Documents
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.reports') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Clients
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Visits
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Financial
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Inventory
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Procedures
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Insurance
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Blank Forms
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Services
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.miscellaneous') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Patient Education
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Patient Portal
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Authorizations
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Address Book
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Order Catalog
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">BatchCom
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Preferences
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">New Documents
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Utilities
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Document Templates
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.popups') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">Issues
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Appts
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Superbill
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Payment
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Letter
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Chart Label
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Barcode Label
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Address Label
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                       bg-gray-700 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center
                       transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100">
                        <span class="mr-0.5">{{ $t('menu.qa_measures') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">View Reports
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Create MIPS Report
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Select Measures
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Upload Claim Files
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Instance Counts
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Remove Provider Assignments
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Provider Encounter Counts
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Database Imports
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Database Inserts
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">MIPS Module Installer
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Alert Logs
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="dropdown inline-block relative">
                    <div :class="isActiveClass('dashboard.calendar')">
                        <span class="mr-0.5">{{ $t('menu.help') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </div>
                    <div class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="relative bg-white">
                            <inertia-link
                                :href="route('patients.index')"
                                :class="isSubMenuActive('patients.index')">About
                            </inertia-link>
                            <inertia-link
                                :href="route('patients.create')"
                                :class="isSubMenuActive('patients.create')">Forums
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Chat
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.settings')"
                                :class="isSubMenuActive('dashboard.settings')">Contact
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="md:block ml-2">
                    <div class="flex items-center md:ml-4">
                        <LanguageSwitcher/>
                        <button class="p-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        <div class="ml-1 relative">
                            <div>
                                <div v-if="open" @click="open = false" class="fixed inset-0"></div>
                                <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                                    <div class="relative w-8 h-8">
                                        <img class="rounded-full border border-1 border-gray-100 shadow-sm" src="/images/avatars/admin.png" alt="user image">
                                        <div class="absolute top-0 right-0 h-2 w-2 border-2 border-white rounded-full bg-green-400 z-1"></div>
                                    </div>
                                </button>
                            </div>
                            <transition
                                enter-active-class="transition-all transition-fastest ease-out-quad"
                                leave-active-class="transition-all transition-faster ease-in-quad"
                                enter-class="opacity-0 scale-70"
                                enter-to-class="opacity-100 scale-100"
                                leave-class="opacity-100 scale-100"
                                leave-to-class="opacity-0 scale-70">
                                <div v-if="open" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                    <div class="py-1 rounded-md bg-white shadow-xs">
                                        <inertia-link
                                            :href="route('dashboard.profile')"
                                            :class="isSubMenuActive('dashboard.profile')">
                                            {{ $page.auth.user.first_name + " " + $page.auth.user.last_name }}
                                        </inertia-link>
                                        <inertia-link
                                            :href="route('dashboard.profile')"
                                            :class="isSubMenuActive('dashboard.profile')"> Your Profile
                                        </inertia-link>

                                        <inertia-link
                                            :href="route('dashboard.settings')"
                                            :class="isSubMenuActive('dashboard.settings')"> Settings
                                        </inertia-link>
                                        <inertia-link
                                            :href="route('logout')" method="post"
                                            :class="isSubMenuActive('logout')"> Sign out
                                        </inertia-link>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </nav>
            <p class="h-2"></p>
            <div class="flex flex-wrap items-center text-base md:ml-2">
                <p class="text-sm ...">Patient:
                    <span class="font-bold">Test Patient</span>
                </p>
            </div>
        </div>
    </header>
</template>

<script>
    import LanguageSwitcher from '~/components/LanguageSwitcher';
    import Icon from "~/components/Icon";
    export default {
        name: "navbar",
        props: {
            url: String,
        },
        data: () => ({
            open: false,
        }),
        components: {
            Icon,
            LanguageSwitcher,
        },
        methods: {
            isUrl(...urls) {
                if (urls[0] === '') {
                    return this.url === ''
                }
                let routeName = this.route(urls[0]).urlBuilder.path;
                return routeName === this.url
            },
            isActiveClass: function(url) {
                return this.isUrl(url) ?
                    'mr-1.5 ml-1.5 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' +
                    'inline-flex items-center bg-gray-700 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 ' +
                    'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100':

                    'mr-1.5 ml-1.5 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' +
                    'inline-flex items-center hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 ' +
                    'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100'
            },
            isSubMenuActive: function (url) {
                return this.isUrl(url) ?
                    'block px-4 py-2 text-sm text-gray-700 bg-gray-100 hover:bg-gray-100' :
                    'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'
            }
        },
    }
</script>
