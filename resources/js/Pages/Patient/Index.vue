<template>
    <layout>
        <ul class="flex text-gray-500 text-xl font-semibold mb-3">
            <li class="inline-flex items-center">
                <a href="/">{{ $t('menu.patient_client')}}</a>
                <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a href="#" class="text-teal-400">Patients</a>
            </li>
        </ul>
        <div class="container">
            <vue-good-table
                :columns="columns"
                :rows="patients"
                :search-options="{enabled: true}"
                :pagination-options="{enabled: true}"
                styleClass="vgt-table striped"
                @on-row-click="onRowClick"
                :line-numbers="false">
                <template slot="table-column" slot-scope="props">
                    <span class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        {{props.column.label}}
                    </span>
                </template>
                <template slot="table-row" slot-scope="props">
                    <span v-if="props.column.field === 'patient_id'">
                        <span class="inline-block bg-gray-200 rounded px-1 py-1 text-xs font-bold text-gray-800 ml-2">{{props.row.id}}</span>
                    </span>
                    <div v-else-if="props.column.field === 'patient_details'" class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full"
                                 :src="getPatientImage(props.row.id, props.row.sex)"
                                 :alt="props.row.id">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                                {{props.row.first_name}} {{props.row.last_name}}
                            </div>
                            <div class="text-xs leading-5 text-gray-500">
                                {{props.row.email}}
                            </div>
                        </div>
                    </div>

                    <span v-else-if="props.column.field === 'last_name'">
                        {{props.row.last_name}}
                    </span>
                    <span v-else-if="props.column.field === 'sex'">
                        {{props.row.sex}}
                    </span>
                    <span v-else-if="props.column.field === 'date_of_birth'">
                        {{props.row.date_of_birth}}
                    </span>
                    <span v-else>
                        <a :href="`/patients/${props.row.id}`"
                        class="mr-3 text-sm bg-gray-800 hover:bg-gray-900 text-white py-1 px-2 rounded
                        focus:outline-none focus:shadow-outline">
                            <span class="badge badge-danger">View</span>
                        </a>
                        <a :href="`/patients/${props.row.id}/edit`">
                            <span class="badge badge-danger">Edit</span>
                        </a>
                     </span>
                </template>
            </vue-good-table>
        </div>
    </layout>
</template>

<script>
    import Layout from "~/Shared/Layout"
    import 'vue-good-table/dist/vue-good-table.css'
    import { VueGoodTable } from 'vue-good-table'
    import i18n from '~/i18n'

    export default {
        metaInfo: { title: i18n.t('menu.fees') },
        name: "patient.index",
        props: ['patients'],
        data: () => ({
            columns: [
                {
                    label: 'Patient ID',
                    field: 'patient_id',
                },
                {
                    label: 'Patient',
                    field: 'patient_details'
                },
                {
                    label: 'Date of Birth',
                    field: 'date_of_birth',
                    type: 'date',
                    dateInputFormat: 'yyyy-MM-dd',
                    dateOutputFormat: 'MMM do yy'
                },
                {
                    label: 'Sex',
                    field: 'sex'
                },
                {
                    label: 'Actions',
                    field: 'actions'
                },
            ],
        }),
        components: {
            Layout,
            VueGoodTable,
        },
        methods: {
            onRowClick(params) {
                alert(params.pageIndex);
                // params.row - row object
                // params.pageIndex - index of this row on the current page.
                // params.selected - if selection is enabled this argument
                // indicates selected or not
                // params.event - click event
            },
            rowStyleClassFn(row) {
                return row.sex === 'male' ? 'text-green-300' : 'text-red-500';
            },
            columnFilterFn(data, filterString) {
                console.log(data);
            },
            getPatientImage(id, gender) {
                return gender === "male" ? '/images/avatars/male.png' : '/images/avatars/female.png';
            }
        }
    }
</script>

