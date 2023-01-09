<template>
    <div class="px-5 md:px-10">
        <div v-if="file_permissions.errors" class="mb-3 my-4 bg-red-100 border-red-500 text-red-900 rounded-b border-t-4 px-4 py-3 shadow-md" role="alert">
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
                <tr>
                    <th class="py-4 px-6 bg-grey-lighter uppercase text-xs text-grey border-b border-grey-light">Files</th>
                    <th class="py-4 px-6 bg-grey-lighter uppercase text-xs text-grey border-b border-grey-light">Required</th>
                    <th class="py-4 px-6 bg-grey-lighter uppercase text-xs text-grey border-b border-grey-light">Current</th>
                </tr>
                </thead>
                <tbody id="file_permissions">
                    <tr v-for="filePermission in file_permissions.permissions"
                        :class="filePermission.status ? 'hover:bg-blue-100' : 'bg-red-100 hover:bg-red-200'">
                        <td class="py-4 px-6 border-b border-gray-100 text-sm">{{ filePermission.folder }}</td>
                        <td class="py-4 px-6 border-b border-gray-100 text-center">
                            <div class="flex flex-row">
                                <span class="mr-2">{{ filePermission.permission }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 border-b border-gray-100 text-center">
                            <div class="flex flex-row items-center">
                                <span class="mr-2">{{ filePermission.current_permission }}</span>
                                <icon :name="filePermission.status ? 'check-circle' : 'x-circle'"
                                      :class="filePermission.status ? 'text-green-500' : 'text-red-500'"
                                      class="h-5 w-5 mx-1"/>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-sm my-4 bg-gray-100 p-4 rounded font-semibold">
                <strong>Hint:</strong> Run the following command to <pre>chmod 775 folder_path </pre>
            </div>
        </div>
    </div>
</template>

<script>
import InstallerLayout from "../../layouts/InstallerLayout"

export default {
    name: 'Installer_Files_Permission',
    layout: InstallerLayout,
    props: {
        file_permissions: Object,
    }
}
</script>

<style scoped>

</style>
