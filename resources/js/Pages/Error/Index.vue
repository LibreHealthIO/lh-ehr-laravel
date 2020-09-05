<template>
    <layout>
        <h1 class="text-2xl font-semibold mb-3">Error -{{ status }} </h1>
        <div class="relative pb-full md:flex md:pb-0 md:min-h-screen w-full md:w-1/2"> {{ description }}
            <div :style="{ backgroundImage: `url('/images/svgs/404.svg')` }" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '~/Shared/Layout';
    export default {
        metaInfo: { title: 'Error' + this.status },
        props: {
            status: Number,
        },
        computed: {
            title() {
                return {
                    503: '503: Service Unavailable',
                    500: '500: Server Error',
                    404: '404: Page Not Found',
                    403: '403: Forbidden',
                }[this.status]
            },
            description() {
                return {
                    503: 'Sorry, we are doing some maintenance. Please check back soon.',
                    500: 'Whoops, something went wrong on our servers.',
                    404: 'Sorry, the page you are looking for could not be found.',
                    403: 'Sorry, you are forbidden from accessing this page.',
                }[this.status]
            },
        },
        components: {
            Layout,
        },
    }
</script>
