<template>
    <layout>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <div class="container">
            Patient Details:
            <p>
                <span>Patient ID: {{ patient.id }}</span><br>
                <span>First Name: {{ patient.first_name }}</span><br>
                <span>Middle Name: {{ patient.middle_name }}</span><br>
                <span>Last Name: {{ patient.last_name }}</span><br>
            </p>
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
        name: "patient.show",
        props: {
            patient: Object,
        },
        data() {
            return {
                pagesRoutes: myBreadcrumbs,
                activeLink: this.patient.first_name,
            }
        },
        components: {
            Layout,
            Breadcrumb,
        },
    }

</script>

