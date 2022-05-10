<template>
    <div class="flex items-center justify-start text-black">
        <div v-on:click="click(data)" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
            <Icon name="eye" class="cursor-pointer" />
        </div>
        <div v-on:click="click(data)" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
            <Icon name="pencil-alt" class="cursor-pointer" />
        </div>
        <div v-on:click="click(data)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
            <Icon name="trash" class="cursor-pointer" />
        </div>
    </div>
</template>
<script>

export default {
    name: "ActionButtons",
    props: {
        data: Object,
        meta: Object,
        click: {
            type: Function,
            default: null
        }
    },
}

</script>
<style scoped>
</style>
