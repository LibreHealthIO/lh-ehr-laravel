<template>
    <div>
        <Breadcrumb :active-link="activeLink"/>
        <div class="flex-row flex-grow">
           {{ facilities }}
        </div>
    </div>
</template>

<script>
    import DashboardLayout from "../../layouts/DashboardLayout";
    import i18n from "../../i18n";

    export default {
        metaInfo: { title: i18n.t('menu.facilities') },
        name: "facilities.index",
        layout: DashboardLayout,
        props: {
            facilities: Array
        },
        data() {
           return {
               activeLink: i18n.t('menu.facilities'),
           }
        },
        methods: {
            //
        }
    }
</script>

