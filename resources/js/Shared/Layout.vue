<template>
    <main>
        <navbar :url="url()"/>
        <div class="container flex-wrap mx-auto p-8 mt-24 md:mt-16 pt-10">
            <slot />
        </div>
    </main>
</template>

<script>
    import Navbar from '~/Shared/Navbar'
    export default {
        name: "Layout",
        components: {
            Navbar,
        },
        methods: {
            url() {
                return location.pathname.substr(1);
            }
        },
    }
</script>

<style scoped>

</style>
