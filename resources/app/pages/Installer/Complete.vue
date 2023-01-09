<template>
    <div class="px-5 md:px-10">
        This is the complete profile
    </div>
</template>

<script>
import InstallerLayout from "../../layouts/InstallerLayout.vue";

export default {
    name: "Installer_Complete",
    layout: InstallerLayout,
    props: {
        sites: Object,
    }
}
</script>

<style scoped>

</style>
