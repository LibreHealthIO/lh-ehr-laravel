<template>
    <div class="ltr:-ml-10 rtl:-mr-10">
        <div v-for="i in 7" class="flex py-4 items-start">
            <div class="flex-shrink-0 mx-2">
                <span class="h-8 w-8 pt-1 flex items-center justify-center rounded-full text-xs leading-10 font-display font-bold text-white"
                    :class="activeStep > i ? 'bg-green-500' : activeStep === i ? 'bg-orange-500' : 'bg-gray-900'">
                    {{ '0' + i }}
                </span>
            </div>
            <div class="mt-2 text-xs items-center justify-center">
                <inertia-link v-if="activeStep === 0" :href="route('installer.index')" class="px-1 -my-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                    <span class="no-underline">{{ $t('installer.introduction') }}</span>
                </inertia-link>
                <inertia-link v-if="activeStep === 1" :href="route('installer.requirements')" class="px-1 -my-1 -mx-1 py-1 transition duration-200 ease-in-out relative block
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                    <span class="no-underline">{{ $t('installer.server_requirements') }}</span>
                </inertia-link>
                <inertia-link v-if="activeStep === 2" :href="route('installer.file_permissions')" class="px-1 -my-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                    <span class="no-underline">{{ $t('installer.file_permissions') }}</span>
                </inertia-link>
                <inertia-link v-if="activeStep === 3" :href="route('installer.index')" class="px-1 -my-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                    <span class="no-underline">{{ $t('installer.database') }}</span>
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    'name': 'InstallerSidebar',
    props: {
        activeStep: {
            type: Number,
            default: 0
        }
    }
}
</script>
