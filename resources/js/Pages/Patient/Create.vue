<template>
    <layout>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <div class="container">
            Creating patient
        </div>
    </layout>
</template>

<script>
    import Layout from "~/Shared/Layout"
    import Breadcrumb from "../../components/Breadcrumb"
    import i18n from '~/i18n'


    let myBreadcrumbs = [
        {
            title : i18n.t('menu.patient_client'),
            link : route('patients.index')
        },
    ];

    export default {
        metaInfo: { title: i18n.t('menu.patient_client') },
        name: "patient.create",
        props: ['patients'],
        data: () => {
            return {
                pagesRoutes: myBreadcrumbs,
                activeLink: 'Add Patients/Clients',
            };
        },
        components: {
            Layout,
            Breadcrumb
        },
    }
</script>

