<template>
    <layout>
        <Breadcrumb :active-link="activeLink"/>
        <div class="flex-row flex-grow">
            <vue-good-table
                :columns="columns"
                :rows="facilities"
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
                    <div v-if="props.column.field === 'facility_details'" class="flex items-center">
                        <div class="p-1 h-10 w-10">
                            <img :src="getFacilityImage(props.row.id)"
                                 :alt="props.row.id">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                                {{props.row.name}} <div class="font-bold w-12 h-1 rounded text-gray-800" :style="'background:'+props.row.color"></div>
                            </div>
                            <div class="text-xs leading-5 text-gray-500">
                                {{props.row.email}}
                            </div>
                        </div>
                    </div>
                    <span v-else-if="props.column.field === 'address'">
                        <div class="text-sm leading-5 font-medium text-gray-900">
                            {{props.row.address.line1}}, {{props.row.address.line2}}
                        </div>
                        <div class="text-xs leading-5 text-gray-500">
                            {{props.row.address.city.name}}, {{props.row.address.state}} - {{props.row.address.country.emoji}} {{props.row.address.country.code.toUpperCase()}}
                        </div>
                    </span>
                    <span v-else-if="props.column.field === 'phone'">
                        {{props.row.phone}}
                    </span>
                    <span v-else>
                        <inertia-link :href="route('facilities.show', props.row.id)"
                        class="mr-3 text-sm bg-gray-800 hover:bg-gray-900 text-white py-1 px-2 rounded
                        focus:outline-none focus:shadow-outline">
                            <span class="badge badge-danger">View</span>
                        </inertia-link>
                        <inertia-link :href="route('facilities.edit', props.row.id)">
                            <span class="badge badge-danger">Edit</span>
                        </inertia-link>
                     </span>
                </template>
            </vue-good-table>
        </div>
    </layout>
</template>

<script>
    import Layout from "~/Shared/Layout"
    import Breadcrumb from "../../components/Breadcrumb"
    import 'vue-good-table/dist/vue-good-table.css'
    import { VueGoodTable } from 'vue-good-table'
    import i18n from '~/i18n'

    export default {
        metaInfo: { title: i18n.t('menu.facilities') },
        name: "facilities.index",
        props: ['facilities'],
        data: () => ({
            activeLink: i18n.t('menu.facilities'),
            columns: [
                {
                    label: 'Facility',
                    field: 'facility_details'
                },
                {
                    label: 'Address',
                    field: 'address'
                },
                {
                    label: 'Phone',
                    field: 'phone'
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
            Breadcrumb,
        },
        methods: {
            onRowClick(params) {
                let facilityRoute = route('facilities.show', params.row.id);
                this.$inertia.visit(facilityRoute);
            },
            columnFilterFn(data, filterString) {
                console.log(data);
            },
            getFacilityImage(id) {
                // TODO get image property
                return '/images/svg/hospital.svg';
            }
        }
    }
</script>

