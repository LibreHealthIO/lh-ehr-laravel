<template>
    <layout>
        <ul class="flex text-gray-500 text-xl font-semibold mb-3">
            <li class="inline-flex items-center">
                <a href="/">Users</a>
                <svg
                    class="h-5 w-auto text-gray-400"
                    fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a href="#" class="text-teal-400">Add New</a>
            </li>
        </ul>
        <div class="container">
            <vue-good-table
                :columns="columns"
                :rows="users"
                :search-options="{
                    enabled: true
                }"
                :pagination-options="{enabled: true}"
                styleClass="vgt-table striped"
                :line-numbers="false">
                <template slot="table-column" slot-scope="props">
                    <span class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        {{props.column.label}}
                    </span>
                </template>
                <template slot="table-row" slot-scope="props">
                    <tr>
                        <td v-if="props.column.field === 'first_name'" class="px-6 py-4 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        Jane Cooper
                                    </div>
                                    <div class="text-sm leading-5 text-gray-500">
                                        jane.cooper@example.com
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td v-if="props.column.field === 'last_name'" class="px-6 py-4 whitespace-no-wrap">
                            <div class="text-sm leading-5 text-gray-900">Regional Paradigm Technician</div>
                            <div class="text-sm leading-5 text-gray-500">Optimization</div>
                        </td>
                        <td v-if="props.column.field === 'access_control'" class="px-6 py-4 whitespace-no-wrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Active
                            </span>
                        </td>
                        <td v-if="props.column.field === 'fname'" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            Admin
                        </td>
                        <td v-if="props.column.field === 'fname'" class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>

                    <span v-if="props.column.field === 'fname'">
                        {{props.row.fname}}
                    </span>
                    <span v-else-if="props.column.field === 'lname'">
                        {{props.row.lname}}
                    </span>
                    <span v-else-if="props.column.field === 'access_control'">
                        <span class="badge badge-pill badge-default-outline">{{props.row.access_control}}</span>
                    </span>
                    <span v-else-if="props.column.field === 'created_at'">
                        <a :href="`/user/${props.row.id}/delete`">
                            <span class="badge badge-danger">Delete</span>
                        </a>
                     </span>
                    <span v-else>
                        {{ props.formattedRow[props.column.field] }}
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

    export default {
        metaInfo: { title: 'Flow Board' },
        name: "flow_board",
        props: ['users'],
        data: () => ({
            columns: [
                { label: 'asd', field: 'pid'},
                { label: 'Last Name', field: 'pid'},
                { label: 'Home Phone', field: 'pid'},
                { label: 'Date of Birth', field: 'pid'},
                { label: 'Patient Id', field: 'pid'},
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
                return row.age > 18 ? 'text-green-300' : 'text-red-500';
            },
        }
    }
</script>

