<template>
    <div class="mx-4">
        <notifications position="bottom right">
            <template slot="body" slot-scope="{ item, close }">
                <div class="w-full mr-2 mb-4 mt-1 right-2">
                    <div :class="getFlashClass(item.type)" class="relative w-auto flex flex-row items-center p-4 font-semibold tracking-tighter mr-4 shadow-md">
                        <div class="absolute top-1" :class="$i18n.locale === 'he' ? 'left-2' : 'right-2'">
                            <button @click="close" aria-label="Close Notification"
                                    class="h-5 w-5 p-1 flex items-center justify-center rounded-full border border-white outline-none focus:outline-none">
                                <Icon name="x" class="h-4 w-4"/>
                            </button>
                        </div>
                        <div class="flex flex-row">
                            <div :class="getBgClass(item.type)" class="w-1 h-8 items-center mx-1"></div>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-bold text-sm underline" v-html="item.title"/>
                            <div class="mt-1 text-xs" v-html="item.text"/>
                        </div>
                    </div>
                </div>
            </template>
        </notifications>
        <notifications group="auth" position="top right">
            <template slot="body" slot-scope="{ item, close }">
                <div class="w-full mr-2 mt-4 mb-1 right-2">
                    <div :class="getFlashClass(item.type)" class="relative w-auto flex flex-row items-center p-4 font-semibold tracking-tighter mr-4 shadow-md">
                        <div class="absolute top-1" :class="$i18n.locale === 'he' ? 'left-2' : 'right-2'">
                            <button @click="close" aria-label="Close Notification"
                                    class="h-5 w-5 p-1 flex items-center justify-center rounded-full border border-white outline-none focus:outline-none">
                                <Icon name="x" class="h-4 w-4"/>
                            </button>
                        </div>
                        <div class="flex flex-row">
                            <div :class="getBgClass(item.type)" class="w-1 h-8 items-center mx-1"></div>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-bold text-sm underline" v-html="item.title"/>
                            <div class="mt-1 text-xs" v-html="item.text"/>
                        </div>
                    </div>
                </div>
            </template>
        </notifications>
        <notifications group="app" position="bottom right">
            <template slot="body" slot-scope="{ item, close }">
                <div class="w-full mr-2 mb-4 mt-1 right-2">
                    <div :class="getFlashClass(item.type)" class="relative w-auto flex flex-row items-center p-4 font-semibold tracking-tighter mr-4 shadow-md">
                        <div class="absolute top-1" :class="$i18n.locale === 'he' ? 'left-2' : 'right-2'">
                            <button @click="close" aria-label="Close Notification"
                                    class="h-5 w-5 p-1 flex items-center justify-center rounded-full border border-white outline-none focus:outline-none">
                                <Icon name="x" class="h-4 w-4"/>
                            </button>
                        </div>
                        <div class="flex flex-row">
                            <div :class="getBgClass(item.type)" class="w-1 h-8 items-center mx-1"></div>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-bold text-sm underline" v-html="item.title"/>
                            <div class="mt-1 text-xs" v-html="item.text"/>
                        </div>
                    </div>
                </div>
            </template>
        </notifications>
        <notifications group="error" position="top right">
            <template slot="body" slot-scope="{ item, close }">
                <div class="w-full mr-2 mt-4 mb-1 right-2">
                    <div :class="getFlashClass(item.type)" class="relative w-auto flex flex-row items-center p-4 font-semibold tracking-tighter mr-4 shadow-md">
                        <div class="absolute top-1" :class="$i18n.locale === 'he' ? 'left-2' : 'right-2'">
                            <button @click="close" aria-label="Close Notification"
                                    class="h-6 w-6 p-1 flex items-center justify-center outline-none focus:outline-none">
                                <Icon name="x" class="h-4 w-4"/>
                            </button>
                        </div>
                        <div class="flex flex-row">
                            <div :class="getBgClass(item.type)" class="w-1 h-8 items-center mx-1"></div>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-bold text-sm underline" v-html="item.title"/>
                            <div class="mt-1 text-xs" v-html="item.text"/>
                        </div>
                    </div>
                </div>
            </template>
        </notifications>
        <notifications group="app_center" position="top center">
            <template slot="body" slot-scope="{ item, close }">
                <div class="w-full mr-2 my-1 right-2">
                    <div :class="getFlashClass(item.type)" class="relative w-auto flex flex-row items-center p-4 font-semibold tracking-tighter mr-4 shadow-md">
                        <div class="absolute top-1" :class="$i18n.locale === 'he' ? 'left-2' : 'right-2'">
                            <button @click="close" aria-label="Close Notification"
                                    class="h-5 w-5 p-1 flex items-center justify-center rounded-full border border-white outline-none focus:outline-none">
                                <Icon name="x" class="h-4 w-4"/>
                            </button>
                        </div>
                        <div class="flex flex-row">
                            <div :class="getBgClass(item.type)" class="w-1 h-8 items-center mx-1"></div>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-bold text-sm underline" v-html="item.title"/>
                            <div class="mt-1 text-xs" v-html="item.text"/>
                        </div>
                    </div>
                </div>
            </template>
        </notifications>
    </div>
</template>
<script>
export default {
    watch: {
        "$page.flash": {
            handler() {
                if (this.$page.props.flash.error) {
                    this.$notify(
                        {
                            group: "error",
                            type: "error",
                            title: this.$t('general.error'),
                            text: this.$page.props.flash.error,
                            duration: 5000,
                        }
                    );
                } else if (this.$page.props.flash.success) {
                    this.$notify(
                        {
                            group: "app",
                            type: "success",
                            title: this.$t('general.success'),
                            text: this.$page.props.flash.success,
                            duration: 5000,
                        }
                    );
                } else if (this.$page.props.flash.warning) {
                    this.$notify(
                        {
                            group: "app",
                            type: "warning",
                            title: this.$t('general.warning'),
                            text: this.$page.props.flash.warning,
                            duration: 5000,
                        }
                    );
                } else if (this.$page.props.flash.info) {
                    this.$notify(
                        {
                            group: "app",
                            type: "info",
                            title: this.$t('general.info'),
                            text: this.$page.props.flash.info,
                            duration: 5000,
                        }
                    );
                } else if (this.$page.props.flash.message) {
                    this.$notify(
                        {
                            group: "error",
                            type: "info",
                            title: this.$t('general.info'),
                            text: this.$page.props.flash.message,
                            duration: 5000,
                        }
                    );
                }
            },
            deep: true
        },
    },
    methods: {
        getFlashClass(status) {
            return status === "warn" ? "bg-yellow-100 text-gray-800" :
                status === "error" ? "bg-red-100 text-gray-800" :
                    status === "success" ? "bg-green-100 text-green-700" :
                        "bg-blue-100 text-gray-800"
        },
        getBgClass(status) {
            return status === "warn" ? "bg-yellow-700" :
                status === "error" ? "bg-red-700" :
                    status === "success" ? "bg-green-700" :
                        "bg-blue-700"
        },
    }
}
</script>
