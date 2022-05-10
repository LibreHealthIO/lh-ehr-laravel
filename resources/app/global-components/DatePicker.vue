<template>
    <div>
        <v-date-picker v-model="date"/>
    </div>
</template>

<script>
    export default {
        name: "ehr_date_picker",
        data() {
            return {
                date: new Date(),
            }
        }
    }
</script>
