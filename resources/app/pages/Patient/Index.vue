<template>
    <div>
        <Breadcrumb :active-link="activeLink"/>
        <div class="flex-row flex-grow">
            {{ patients }}
        </div>
    </div>
</template>

<script>
    import DashboardLayout from "../../layouts/DashboardLayout"
    import i18n from "../../i18n";

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
            }
        },
        methods: {
            //
        }
    }
</script>

