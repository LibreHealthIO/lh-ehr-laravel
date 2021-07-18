<template>
    <div>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <h1  class="text-xl font-light mb-3">Add New Patient</h1>
        <div class="flex-row flex-grow">
            <form @submit.prevent="submit" class="w-full mt-2">
                Create facility
                <button type="submit" class="flex text-base text-white justify-center px-10 py-3 rounded-md bg-gray-900 mb-3">
                    <svg class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ $t('forms.continue') }}
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import DashboardLayout from "../../layouts/DashboardLayout";
    import i18n from "../../i18n";


    export default {
        metaInfo: {
            title: i18n.t('menu.patient_client')
        },
        name: "facility.create",
        layout: DashboardLayout,
        props: ['facilities'],
        data: () => {
            return {
                sending: false,
                pagesRoutes: [
                    {
                        title : i18n.t('menu.patient_client'),
                        link : this.route('patients.index')
                    },
                ],
                activeLink: 'Add Patients/Clients',
            };
        },
        methods: {
            submit() {
                //
            },
        }
    }
</script>

