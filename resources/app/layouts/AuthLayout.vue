<template>
    <main>
        <FlashMessages/>
        <div class="w-full h-screen flex">
            <img :src="'/images/main_bg.jpg'" alt="background" class="object-cover object-center h-screen w-7/12">
            <div class="bg-white overflow-scroll-container flex flex-col  w-5/12 shadow-lg border-solid border-t-4 border-orange-600">
                <div class="flex rtl:ml-10 ltr:mr-10 my-4 justify-end">
                    <LanguageSwitcher/>
                </div>
                <div class="my-2 flex flex-col justify-center items-center">
                    <div class="max-w-md rounded-sm border border-gray-200 bg-white shadow-lg">
                        <div class="text-right p-4">
                            <span class="text-xs text-gray-500 tracking-widest">
                                <span class="uppercase">{{ $page.props.app_name }}</span> <span>(v{{ $page.props.app_version }})</span>
                            </span>
                        </div>
                        <div class="flex items-center relative mb-10">
                            <div class="border-t border-gray-200 z-20 w-full"></div>
                            <div class="rounded-full bg-gray-800 z-20 p-2 inline-block absolute mx-5 rtl:left-5 ltr:left-5">
                                <a href="https://github.com/LibreHealthIO/lh-ehr-laravel.git" title="Fork me on Github">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white inline-block h-8 w-8" viewBox="0 0 25 25">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <slot />
                    </div>
                </div>
                <Footer/>
            </div>
        </div>
    </main>
</template>
<script>
import FlashMessages from "../shared/includes/FlashMessages"
import LanguageSwitcher from "../components/LanguageSwitcher.vue";

export default {
    name: "DashboardLayout",
    props: {
        errors: Object
    },
    components: {
        LanguageSwitcher,
        FlashMessages
    },
}
</script>

<style scoped>

</style>
