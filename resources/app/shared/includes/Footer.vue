<template>
    <div class="footer">
        <div class="w-full text-center border-grey p-4 pin-b">
            <div class="flex pb-5 px-3 m-auto pt-5 border-t text-gray-800 text-sm flex-col md:flex-row max-w-6xl">
                <div class="mt-2">
                <span class="text-xs text-gray-500 tracking-widest">
                    (v{{ window.app_version }} ) | <a :href="route('acknowledge_license_cert')" class="font-medium text-gray-600 underline pr-2 hover:text-orange-500">
                        {{ $t('general.acknowledgement_licensing_and_cert') }}
                    </a>
                </span>
                </div>
                <div class="mt-2"> {!! copyrights_text() !!}</div>
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
