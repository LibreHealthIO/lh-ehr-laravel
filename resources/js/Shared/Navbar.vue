<template>
    <header class="h-24 text-gray-100 bg-gray-900 body-font shadow w-full fixed pin-t z-50">
        <div class="p-2 flex-col items-center pt-20">
            <nav class="flex flex-wrap items-center text-base md:ml-0">
                <inertia-link :href="route('dashboard')" class="p-1 border-transparent text-gray-400 rounded-full hover:text-white bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                    <svg class="h-5 w-5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </inertia-link>
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
                            <inertia-link v-if="$page.ehr_patient.patient != null"
                                :href="route('patients.select', $page.ehr_patient.patient.id)"
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
                    <div :class="isActiveClass('dashboard.calendar')">
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
                                :href="route('about')"
                                :class="isSubMenuActive('about')">About
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
                                :href="route('contact')"
                                :class="isSubMenuActive('contact')">Contact
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="md:block ml-2">
                    <div class="flex items-center md:ml-4">
                        <LanguageSwitcher/>
                        <button class="p-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
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
                                <div v-if="open" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50">
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
            <div class="flex flex-wrap items-center text-base -mt-1 md:ml-2 mb-2">
                <div class="text-sm uppercase" style="font-size: 11px">
                    <div v-if="$page.ehr_patient.patient === null">
                        <span>{{ $t('menu.patient_client') }}:</span> <span class="font-bold">None</span>
                    </div>
                    <div v-else>
                        <span>{{ $t('menu.patient_client') }}:</span>
                        <span class="font-bold">
                            {{ $page.ehr_patient.patient.first_name }}
                            {{ $page.ehr_patient.patient.last_name }}
                            ({{ $page.ehr_patient.patient.id }})
                        </span>
                        <inertia-link :href="route('patients.clear', $page.ehr_patient.patient.id)" class="mr-1.5 mb-1 ml-1.5 px-2 py-1 rounded-md text-xs
                        font-small text-gray-300 hover:text-white inline-flex items-center bg-gray-700 font-bold
                        hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-700 uppercase pointer">
                            Clear
                        </inertia-link><br>
                        <span>{{ $t('forms.date_of_birth') }}:</span>
                        <span class="font-bold">{{ $page.ehr_patient.patient.date_of_birth }}</span> &nbsp;
                        <span>{{ $t('forms.age') }}:</span>
                        <span class="font-bold">{{ $page.ehr_patient.patient.age }}</span>
                    </div>
                </div>
                <div class="flex flex-grow lg:flex-row mr-40 justify-end">
                    <div class="relative mt-1 text-sm uppercase w-64" style="font-size: 11px">
                        <div v-if="$page.ehr_patient.patient === null" class="mb-1">
                            <span>{{ $t('general.selected_encounter') }}:</span> <span class="font-bold">None</span>
                        </div>
                        <div v-else class="mb-1">
                            <span>{{ $t('general.selected_encounter') }}:</span> <span class="font-bold text-teal-300">2020-11-18</span>
                            <select class="appearance-none block w-full bg-transparent text-gray-400 border border-gray-500
                        rounded mt-1.5 py-1 px-4 mb-3 leading-tight text-xs focus:outline-none focus:bg-transparent focus:border-gray-500">
                                <option>Choose Encounter</option>
                                <option>New Encounter</option>
                                <option>Past Encounter List (3)</option>
                                <option>2020-11-02 / New Patient ----> Review</option>
                                <option>2020-11-04 / Preventive Care Services ----> Review</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
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
        data() {
            return {
                open: false,
            }
        },
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
                    'mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' +
                    'inline-flex items-center bg-gray-700 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 ' +
                    'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100':

                    'mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' +
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
