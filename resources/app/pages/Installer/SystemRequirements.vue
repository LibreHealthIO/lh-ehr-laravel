<template>
    <div class="px-5 md:px-10">
        <div v-if="requirements.errors || !php_support.supported" class="mb-3 my-4 bg-red-100 border-red-500 text-red-900 rounded-b border-t-4 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <p class="text-sm py-2 font-semibold">
                    Please ensure to correct the errors before proceeding.
                </p>
            </div>
        </div>
        <div class="pb-8 w-full">
            <table class="text-left w-full table-auto text-base" style="border-collapse:collapse">
                <thead>
                    <tr class="py-2 font-medium uppercase text-xs font-bold border-b">
                        <td class="py-4 px-6">
                            <span class="font-bold">PHP (version {{ php_support.minimum }} required)</span>
                        </td>
                        <td class="flex flex-row py-4 justify-end">
                            <span class="font-bold">Current {{ php_support.current }}</span>
                            <icon :name="php_support.supported ? 'check-circle' : 'x-circle'"
                                  :class="php_support.supported ? 'text-green-500' : 'text-red-500'"
                                  class="h-5 w-5 mx-1"/>
                        </td>
                    </tr>
                </thead>.
                <tbody id="php_info">
                    <template v-for="extensions in requirements.requirements">
                        <tr v-for="(enabled, extension) in extensions"
                            class="border-b border-gray-100 p-2"
                            :class="enabled ? 'hover:bg-green-100' : 'bg-red-100 hover:bg-red-200'">
                            <td class="py-4 px-6  border-gray-100 text-sm">
                                {{ extension }}
                            </td>
                            <td class="flex flex-row justify-end">
                                <icon :name="enabled ? 'check-circle' : 'x-circle'"
                                      :class="enabled ? 'text-green-500' : 'text-red-500'"
                                      class="h-5 w-5 mx-1"/>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import InstallerLayout from "../../layouts/InstallerLayout"

export default {
    name: "Installer_SystemRequirements",
    layout: InstallerLayout,
    props: {
        php_support: Object,
        requirements: Object,
    }
}
</script>

<style scoped>

</style>
