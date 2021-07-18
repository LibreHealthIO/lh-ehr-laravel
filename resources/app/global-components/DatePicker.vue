<template>
    <div>
        <VueTailwindPicker @change="(v) => checkin = v">
            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500 rounded
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   v-model="checkin" name="calendar_date" type="text" :placeholder="$t('date')">
        </VueTailwindPicker>
    </div>
</template>

<script>
    import VueTailwindPicker from 'vue-tailwind-picker'
    export default {
        name: "ehr_date_picker",
        components: {
            VueTailwindPicker
        },
        data: () => ({
            checkin: '',
        }),
    }
</script>
