<template>
    <div class="text-black">
        <div v-if="meta && meta.type === 'user'" class="flex justify-start">
            <div v-if="meta.level === 0">
                <inertia-link v-if="data.username" :href="route('dashboard.user.profile', data.username)" class="flex items-center hover:text-theme-1">
                    <div class="mr-2">
                        <img class="w-6 h-6 rounded-full" :src="data.thumbnail" :alt="data.display_name" />
                    </div>
                    <div class="flex flex-col">
                        <span>{{ data.display_name }}</span>
                        <span class="text-theme-1 text-xs"><a :href="'mailto:' + data.email">{{ data.email }}</a></span>
                    </div>
                </inertia-link>
            </div>
            <div v-else>
                <inertia-link v-if="data.user.username" :href="route('dashboard.user.profile', data.user.username)" class="flex items-center hover:text-theme-1">
                    <div class="mr-2">
                        <img class="w-6 h-6 rounded-full" :src="data.user.thumbnail" :alt="data.user.display_name" />
                    </div>
                    <span>{{ data.user.display_name }}</span>
                    <span class="text-theme-1 text-sm"><a :href="'mailto:' + data.user.email">{{ data.user.email }}</a></span>
                </inertia-link>
            </div>
        </div>
        <div v-else-if="meta && meta.type === 'patient'" class="flex justify-start">
            <inertia-link :href="route('dashboard.patients.show', data.pid)" class="flex font-semibold items-center hover:text-theme-1">
                <div class="mr-2">
                    <img class="w-6 h-6 rounded-full" :src="data.thumbnail" :alt="data.display_name" />
                </div>
                <div class="flex flex-col">
                    <span>{{ data.first_name + ' ' + data.middle_name + ' ' + data.last_name }}</span>
                    <span class="text-theme-1 text-xs">{{ data.email }}</span>
                </div>
            </inertia-link>
        </div>
        <div v-else-if="meta && meta.type === 'roles'" class="flex justify-start">
            <inertia-link v-if="data.username" :href="route('user.profile', data.username)" class="flex items-center hover:text-theme-1">
                <div class="mr-2">
                    <img class="w-6 h-6 rounded-full" :src="data.thumbnail" :alt="data.display_name" />
                </div>
                <span>{{ data.display_name }}</span>
            </inertia-link>
            <h1 v-else>{{ data.email }}</h1>
        </div>
        <div v-else>
            {{ data }}
        </div>
    </div>
</template>
<script>
export default {
    name: "TableDetail",
    props: {
        data: Object,
        meta: Object,
    },
    methods: {
        getRandomColor() {
            const colors = ['bg-red-200']
        }
    }
}

</script>
<style scoped>
</style>
