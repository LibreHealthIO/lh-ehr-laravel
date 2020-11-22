<template>
    <div class="calendar-sidebar">
        <ErhDatepicker></ErhDatepicker>
        <div class="relative mt-2">
            <select @change="getFacilityEncounters" class="appearance-none block w-full bg-white text-gray-700 border
             border-gray-500 rounded py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="0">All Facilities</option>
                <option v-for="facility in facilities" :value="facility.id">
                    {{ facility.name }}
                </option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>
        <select @change="getUsersEncounters" id="calendarUserWrapper" size="15" multiple
                class="appearance-none block w-full h-full bg-white text-gray-700 border
            border-gray-500 rounded py-1 px-2 mb-2 leading-tight focus:outline-none focus:bg-white
            focus:border-gray-500">
            <option v-for="user in calendar_users" :value="user.id">
                {{ user.name }}
            </option>
        </select>

    </div>
</template>

<script>
    import ErhDatepicker from "~/components/DatePicker"
    export default {
        name: "CalendarSidebar",
        props: {
            facilities: {
                type: Array,
                required: true
            },
            calendar_users: {
                type: Array,
                required: true
            },
        },
        components: {
            ErhDatepicker,
        },
        computed: {

        },
        methods: {
            getFacilityEncounters (event) {
                // TODO, reflect changes in the calendar
                console.log(event.target.value);
            },
            getUsersEncounters (event) {
                // TODO, reflect changes in the calendar
                console.log(event.target.value);
            }
        }
    }
</script>

<style scoped>

</style>
