<template>
    <div>
        <VueTailwindPicker @change="(v) => checkin = v">
            <input type="text" v-model="checkin"/>
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
