<template>
    <div class="flex flex-inline p-3 mx-auto capitalize text-small">
        <template v-if="pageRoutes != null" v-for="pageRoute in pageRoutes">
            <div class="rounded px-3 py-1.5 bg-gray-400 bg-opacity-30 hover:bg-gray-700">
                <inertiaLink :href="pageRoute.link" class="text-gray-700 hover:text-white">
                    {{ pageRoute.title }}
                </inertiaLink>
            </div>
            <Icon name="arrow-narrow-right" class="flex w-6 h-4 align-middle items-center mt-1 text-theme-1"/>
        </template>
        <template v-if="activeLink != null" class="ml-1">
            <div class="rounded px-3 py-1.5 bg-theme-1 bg-opacity-20">
                <span class="text-theme-1">
                    {{ activeLink }}
                </span>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        name: "Breadcrumb",
        props: {
            pageRoutes: {
                type: Array,
                required: false
            },
            activeLink: {
                type: String,
                required: true
            }
        },
    }
</script>

<style scoped>

</style>
