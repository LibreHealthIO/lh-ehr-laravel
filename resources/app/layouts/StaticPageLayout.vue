<template>
    <div class="w-full h-full flex flex-row">
        <div class="flex flex-col w-3/12 px-8 justify-center items-center border">
            <img class="w-full mx-5 my-5 items-center" :src="'/images/logos/ehr_logo.png'" alt="LibreHealth Logo">
            <h2 class="text-lg uppercase font-bold items-center text-center">The Power of medical health data</h2>
            <div v-if="$page.props.auth.user" class="flex m-5 items-center">
                <inertia-link :href="route('dashboard.index')" class="inline-flex text-base text-white items-center justify-center ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
                    <icon name="dashboard" class="mx-2 h-5 w-5 text-white"/>
                    {{ $t('menu.dashboard') }}
                </inertia-link>
            </div>
            <div v-else class="flex m-5 items-center">
                <inertia-link :href="route('login')" class="inline-flex text-base text-white items-center justify-center ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
                    <icon name="dashboard" class="mx-2 h-5 w-5"/>
                    {{ $t('general.login') }}
                </inertia-link>
            </div>
        </div>
        <div class="bg-white flex flex-col w-9/12 overflow-scroll-container max-h-full overflow-auto shadow-lg border-solid border-t-4 border-orange-600">
            <FlashMessages/>
            <div class="flex rtl:ml-10 ltr:mr-10 my-4 justify-end">
                <LanguageSwitcher/>
            </div>
            <div class="my-5 w-full">
                <div class="mx-10 md:mx-32 mt-10 rounded-sm border border-gray-200 bg-white shadow-lg">
                    <div class="text-right p-5">
                        <span class="text-xs text-gray-500 tracking-widest">
                            <span class="uppercase">{{ $page.props.app_name }}</span> <span>(v{{ $page.props.app_version }})</span>
                        </span>
                    </div>
                    <div class="flex items-center relative mt-2 mb-8">
                        <div class="border-t border-gray-200 z-20 w-full"></div>
                        <div class="rounded-full bg-white border border-t z-20 p-2 inline-block absolute mx-5">
                            <inertia-link :href="route('index')" title="LibreHealth Logo">
                                <img :alt="$page.props.app_name" :src="'/images/logo.png'" class="fill-current text-white inline-block h-8 w-8">
                            </inertia-link>
                        </div>
                        <div class="rounded-full bg-gray-800 z-20 p-2 inline-block rtl:left-5 ltr:right-5 absolute mx-5">
                            <a href="https://github.com/LibreHealthIO/lh-ehr-laravel.git" title="Fork me on Github">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white inline-block h-8 w-8" viewBox="0 0 25 25">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <slot/>
                    <Footer/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import FlashMessages from "../shared/includes/FlashMessages"
import LanguageSwitcher from "../components/LanguageSwitcher.vue";
export default {
    name: "StaticPageLayout",
    components: {
        LanguageSwitcher,
        FlashMessages
    },
}
</script>

<style scoped>

</style>
