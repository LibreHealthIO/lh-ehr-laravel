<template>
    <div>
        <Breadcrumb :active-link="activeLink"/>
        <div class="flex-row flex-grow">
            {{ users }}
        </div>
    </div>
</template>

<script>
    import i18n from "../../i18n";
    import DashboardLayout from "../../layouts/DashboardLayout";

    export default {
        name: "flow_board.index",
        layout: DashboardLayout,
        metaInfo: {
            title: i18n.t('menu.flow_board')
        },
        props: {
            users: Array
        },
        data() {
            return {
                activeLink: i18n.t('menu.flow_board'),
            }
        },
        methods: {
            //
        }
    }
</script>

