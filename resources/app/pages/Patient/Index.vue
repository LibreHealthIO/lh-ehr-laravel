<template>
    <div>
        <Breadcrumb :active-link="activeLink"/>
        <div class="w-full flex mt-2 overflow-y-hidden">
            <data-table
                ref="usersTable"
                :filters="filters"
                :columns="columns"
                framework="tailwind"
                theme="dark"
                :perPage="[40, 60, 80]"
                :url="route('patients.load.data')"
                @loading="isLoading = true"
                @finishedLoading="isLoading = false"
            >
                <div slot="filters" slot-scope="{ tableFilters, perPage }">
                    <div class="flex mb-2">
                        <div class="flex md:w-2/3">
                            <div class="relative inline-flex mx-1">
                                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                <select
                                    v-model="tableFilters.length"
                                    class="border rounded h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option :key="page" v-for="page in perPage">{{ page }}</option>
                                </select>
                            </div>
                            <div class="relative inline-flex mx-1">
                                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                <select
                                    v-model="tableFilters.filters.sex"
                                    class="border rounded h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value>All</option>
                                    <option v-for="(sex, index) in genders" :key="index" :value="sex">{{ sex }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex md:w-1/3 items-end justify-end">
                            <div class="relative text-gray-600">
                                <input v-model="tableFilters.search" class="border h-10 px-5 pr-24 rounded text-sm focus:outline-none" placeholder="Search...">
                                <div class="absolute right-0 top-0 mt-3 mr-2">
                                    <Icon name="search" class="w-4 h-4"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </data-table>
        </div>
    </div>
</template>

<script>
import DashboardLayout from "../../layouts/DashboardLayout"
import i18n from "../../i18n"
import ActionButtons from "../../shared/includes/Table/ActionButtons"
import TableLabel from "../../shared/includes/Table/Label"
import TableDetail from "../../shared/includes/Table/Detail"

export default {
    name: "patient.index",
    layout: DashboardLayout,
    metaInfo: {
        title: i18n.t('menu.patient_client')
    },
    props: {
        patients: Array,
    },
    data() {
        return {
            activeLink: i18n.t('menu.patient_client'),
            genders: ['male', 'female'],
            filters: {
                sex: '',
            },
            columns: [
                {
                    label:  i18n.t('menu.patient_client'),
                    orderable: true,
                    component: TableDetail,
                    meta: {
                        type: 'patient',
                    }
                },
                {
                    label: 'Gender',
                    orderable: true,
                    name: 'sex',
                },
                {
                    label: 'Date of Birth',
                    orderable: true,
                    name: 'date_of_birth',
                },
                {
                    label: 'Actions',
                    orderable: false,
                    event: "click",
                    handler: this.toggleAction,
                    component: ActionButtons,
                    meta: {
                        type: 'user'
                    }
                },
            ],
        }
    },
    methods: {
        toggleAction(user, action) {
            if (!action) return

            // TODO
            console.log(action)
        }
    }
}
</script>

