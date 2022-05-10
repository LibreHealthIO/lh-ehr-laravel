<template>
    <div class="w-full">
        <form @submit.prevent="search" class="flex relative justify-between w-full">
            <input type="search" autofocus v-model="query" class="px-3  py-3 h-10 w-full text-gray-700 border rounded-md z-30 focus:outline-none text-sm font-medium" placeholder="Enter your search keyword here.."/>
            <div v-if="!query" class="absolute bg-white inset-y-6 right-3 z-10 flex items-center text-success">
                <icon name="search"/>
            </div>
        </form>
    </div>

</template>

<script>
import Icon from "../../global-components/Icon";
export default {
    name: "SearchInput",
    components: {
        Icon
    },
    data() {
        return {
            query: null
        }
    },
    methods: {
        search(){
            this.$inertia.get('search', {
                query: this.query,
                category: 'all'
            })
        }
    }
}
</script>

<style scoped>

</style>
