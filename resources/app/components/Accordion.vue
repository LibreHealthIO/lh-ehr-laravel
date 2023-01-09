<template>
    <div class="shadow-md">
        <div class="tab__header">
            <div :class="isActiveClass(active)">
                <span class="block leading-normal font-semibold">{{ title }}</span>
                <div class="float-right">
                    <a href="#" @click.prevent="active = !active" class="float-left">
                        <svg xmlns="http://www.w3.org/2000/svg" v-show="active" class="h-4 w-4 text-gray-500 mr-1"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <svg v-show="!active" class="h-4 w-4 text-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </a>
                    <a href="#" class="float-right">
                        <svg class="bg-red h-4 w-4 text-red-600 ml-1" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="tab-content overflow-hidden leading-normal" v-show="active">
            <slot />
<!--            <ul v-if="appointments">-->
<!--                <li v-for="appointment in appointments" v-bind:key="appointment.id">{{ appointment.username }}</li>-->
<!--            </ul>-->
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    let isActive = false;
    export default {
        name: "Accordion",
        props: {
            title: {
                type: String,
                required: false
            },
            active: {
                type: Boolean,
                default: false
            },
        },
        data: {
            users:[],
            active: false,
        },
        async created() {
            axios.get(route('dashboard.patients.appointments', 4)).then(res => {
                if (res.status === 200) {
                    // this.users = res.data;
                    console.log(res.data);
                }
            }).catch(err => {
                console.log(err);
            });
        },
        methods: {
            isActiveClass: function() {
                return this.active ?
                    'p-4 bg-teal-100 hover:bg-teal-100 block no-underline border-t ' +
                    'border-t-2 border-teal-500 border-white flex justify-between':

                    'p-4 bg-gray-200 hover:bg-teal-100 block no-underline border-t ' +
                    'border-t-2 border-teal-500 border-white flex justify-between'
            },
        }
    }
</script>

<style scoped>

</style>
