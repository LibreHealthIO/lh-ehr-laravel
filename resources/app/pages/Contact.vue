<template>
    <div>
        <dashboard-layout v-if="$page.props.auth.user">
            <h1 class="text-2xl font-semibold mb-3">Contact</h1>
            <p>Contact LibreHealth EHR</p>
        </dashboard-layout>
        <static-page-layout v-else>
            <h1 class="text-2xl font-semibold mb-3">Contact</h1>
            <p>Contact LibreHealth EHR</p>
        </static-page-layout>
    </div>
</template>

<script>
    import DashboardLayout from "../layouts/DashboardLayout"
    import StaticPageLayout from "../layouts/StaticPageLayout"

    export default {
        name: 'Contact',
        metaInfo() {
            return {
                title: this.title
            }
        },
        components: {
            DashboardLayout,
            StaticPageLayout,
        },
        props: {
            status: Number,
        },
    }
</script>
