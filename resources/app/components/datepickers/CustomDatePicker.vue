<template>
    <div>
        <v-date-picker v-model="date"/>
    </div>
</template>

<script>
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
    data() {
        return {
            date: new Date(),
        }
    }
}
</script>
