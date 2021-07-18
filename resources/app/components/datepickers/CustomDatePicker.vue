<template>
    <div>
        <VueTailwindPicker @change="(v) => checkin = v" startDate="1900-04-21" :endDate="current_date">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                {{ name }}
            </label>
            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   v-model="checkin" :name="name" type="text" :placeholder="placeholder">
        </VueTailwindPicker>
    </div>
</template>

<script>
    import VueTailwindPicker from 'vue-tailwind-picker'
    import DayJS from 'dayjs'
    export default {
        name: "CustomDatePicker",
        props: {
            name: {
                type: String,
                required: true
            },
            placeholder: {
                type: String,
                required: false
            },
        },
        components: {
            VueTailwindPicker
        },
        data: () => ({
            checkin: '',
            current_date: DayJS().format('YYYY-MM-DD'),
        }),
    }
</script>
