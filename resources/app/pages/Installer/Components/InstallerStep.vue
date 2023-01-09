<template>
    <div class="flex flex-row">
        <div v-for="i in 7"
             :class="activeStep > i ?  activeStep === i  ? 'bg-orange-500' : 'bg-green-500' : 'bg-gray-200'"
             class="h-1.5 w-10 m-1 rounded-tr rounded-bl text-xs"></div>
    </div>
</template>

<script>

export default {
    'name': 'InstallerStep',
    props: {
        activeStep: {
            type: Number,
            default: 5
        }
    }
}
</script>
