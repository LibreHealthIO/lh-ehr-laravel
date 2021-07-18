<template>
    <ul class="flex text-gray-500 text-xs uppercase font-semibold mb-3">
        <li v-if="pageRoutes != null" v-for="pageRoute in pageRoutes" class="inline-flex items-center">
            <inertia-link
                :href="pageRoute.link"
                class="mr-0.5 ml-0.5 py-1 underline" style="font-size: 15px;">
                {{ pageRoute.title }}
            </inertia-link>
            <svg
                class="h-4 w-auto text-gray-400"
                fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </li>
        <li v-if="activeLink != null" class="inline-flex items-center">
            <span class="text-teal-400 mr-0.5 ml-0.5 py-1 underline" style="font-size: 15px;">
                {{ activeLink }}
            </span>
        </li>
    </ul>
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
