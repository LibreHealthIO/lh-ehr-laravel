<template>
    <main>
        <FlashMessages/>
        <Header/>
        <div class="flex-wrap mx-auto p-8 mt-24 md:mt-16 pt-10">
            <slot />
        </div>
    </main>
</template>
<script>
    import FlashMessages from "../shared/includes/FlashMessages"

    export default {
        name: "DashboardLayout",
        components: {
            FlashMessages
        },
    }
</script>

<style scoped>

</style>
