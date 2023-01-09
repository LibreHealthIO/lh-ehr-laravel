<template>
    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-white" :for="id">
        <span v-html="label"/>
        <span class="required text-sm uppercase">{{ required ? '*' : '' }}</span>
    </label>
</template>

<script>
export default {
    name: "EhrLabel",
    props: {
        label: String,
        id: String,
        required: {
            type: Boolean,
            default: false
        }
    }
}
</script>
