<template>
    <main class="w-full h-screen">
        <FlashMessages/>
        <Header/>
        <div class="w-full h-[calc(100%-5rem)] flex overflow-scroll-container flex-col px-5 pt-4 pb-10">
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
