<template>
    <button :type="type" :disabled="loading"
            :class="'inline-flex items-center px-3 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white hover:bg-theme-1 focus:outline-none  outline-none transition ease-in-out duration-150 '+ bg">
        <svg v-show="loading" :class="loading ? 'animate-spin' : ''" class="-ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <icon v-if="ic && !loading" :name="ic" class="-ml-1 mr-1 h-4 w-4"/>
        <slot />
    </button>
</template>

<script>
export default {
    name: "EhrButton",
    props: {
        type: {
            type: String,
            default: "button"
        },
        ic: {
            type: String,
            default: ""
        },
        bg: {
            type: String,
            default: "bg-theme-3"
        },
        loading: {
            type: Boolean,
            default: false
        }
    },
}
</script>

<style scoped>

</style>
