<template>
    <main>
        <navbar :url="url()"/>
        <div class="flex-wrap mx-auto p-8 mt-24 md:mt-16 pt-10">
            <FlashMessages/>
            <slot />
        </div>
    </main>
</template>
<script>

    import Navbar from '~/Shared/Navbar'
    import FlashMessages from '~/Shared/FlashMessages'
    export default {
        name: "Layout",
        components: {
            Navbar,
            FlashMessages
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
