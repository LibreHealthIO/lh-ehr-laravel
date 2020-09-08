<template>
    <layout>
        <Breadcrumb :active-link="activeLink"/>
        <h1 class="text-2xl font-light mb-3">Dashboard</h1>

    </layout>
</template>
<script>
    import Layout from "~/Shared/Layout";
    import Breadcrumb from "~/components/Breadcrumb";
    import i18n from '~/i18n'

    let title = i18n.t('general.dashboard');
    export default {
        name: "dashboard",
        metaInfo: { title: title },
        data: () => {
            return {
                activeLink: title,
            };
        },
        components: {
            Layout,
            Breadcrumb
        }
    }
</script>
