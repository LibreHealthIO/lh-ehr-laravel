<template>
    <div>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <div class="flex flex-row m-5">
            <div class="w-4/12">
                <img class="rounded-full h-20 w-20 border border-1 border-gray-300 shadow-sm" src="/images/avatars/admin.png" alt="facility image">
                Facility Details:
                <p>
                    <span>Patient ID: {{ facility.id }}</span><br>
                    <span>First Name: {{ facility.name }}</span><br>
                    <span>Middle Name: {{ facility.middle_name }}</span><br>
                    <span>Last Name: {{ facility.last_name }}</span><br>
                </p>
            </div>
            <div class="w-8/12">
                <div class="rounded-lg bg-white shadow-lg md:shadow-xl p-10">
                    <div class="font-bold w-full h-2 mb-5 rounded text-gray-800" :style="'background:'+facility.color"></div>
                    Facility Details:
                    <p>
                        <span>Patient ID: {{ facility.id }}</span><br>
                        <span>First Name: {{ facility.name }}</span><br>
                        <span>Middle Name: {{ facility.middle_name }}</span><br>
                        <span>Last Name: {{ facility.last_name }}</span><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DashboardLayout from "../../layouts/DashboardLayout";
    import i18n from '~/i18n'

    export default {
        metaInfo: {
            title: i18n.t('menu.patient_client')
        },
        name: "facility.show",
        layout: DashboardLayout,
        props: {
            facility: Object,
        },
        data() {
            return {
                pagesRoutes: [
                    {
                        title : i18n.t('menu.facilities'),
                        link : this.route('facilities.index')
                    },
                ],
                activeLink: this.facility.name,
            }
        },
    }

</script>

