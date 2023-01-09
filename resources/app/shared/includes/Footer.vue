<template>
    <div class="footer">
        <div class="w-full flex items-center text-center border-grey p-4 pin-b">
            <div class="flex flex-col pb-5 px-3 m-auto pt-5 border-t text-gray-800 text-sm">
                <div class="mt-2">
                    <div class="text-xs text-gray-500 tracking-widest">
                        (v{{ $page.props.app_version }} ) | <a :href="route('acknowledge_license_cert')" class="font-medium text-gray-600 underline pr-2 hover:text-orange-500">
                            {{ $t('general.acknowledgement_licensing_and_cert') }}
                        </a>
                    </div>
                </div>
                <div v-html="$page.props.copyrights_text" class="mt-2"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style scoped>

</style>
