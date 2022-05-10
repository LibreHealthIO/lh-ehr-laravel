<template>
    <div class="text-black">
        <div v-if="meta && meta.type === 'status_badge'">
            <div class="py-2 px-4">
                <span
                :class="statusBadge(data.status)"
                v-html="getStatusText(data.status)"
                class="py-1 px-3 rounded-full text-xs"/>
            </div>
        </div>
        <div v-else-if="meta && meta.type === 'user_roles'">
            <div v-if="data.user_roles.length > 0" class="py-2 px-2 mx-1">
                <span
                v-for="(role, index) in data.user_roles"
                :class="roleBadge(role)"
                :key="index"
                v-html="role"
                class="py-1 px-3 rounded font-bold text-xs"/>
            </div>
            <div v-else><span class="py-1 px-3 font-bold text-sm"> - </span></div>
        </div>
        <div v-else-if="meta && meta.type === 'date'" class="font-bold" >{{ data.created_at }}</div>
        <div v-else-if="meta && meta.type === 'link'"><inertia-link :href="data.link">{{ data.link }}</inertia-link></div>
        <div v-else> {{ data }} </div>
    </div>
</template>

<script>
    export default {
        name: "TableLabel",
        props: {
            data: Object,
            meta: Object,
        },
        methods: {
            getStatusText(status) {
                return status === 1 ? 'Active' : 'Thrashed' ? status : status
            },
            roleBadge(role) {
                return role === "admin" ? "bg-green-200 text-green-600" :
                       role === "manager" ? "bg-blue-200 text-blue-600" :
                       role === "distributor" ? "bg-yellow-200 text-yellow-600" :
                       role === "artist" ? "bg-orange-200 text-orange-600" :
                       "bg-gray-200 text-gray-600"
            },
            statusBadge(status) {
                return status === "approved" || status === 1 ? "bg-green-200 text-green-600" :
                       status === "complete" || status === 1 ? "bg-green-200 text-green-600" :
                       status === "pending" ? "bg-yellow-200 text-yellow-600" :
                       status === "in-review" ? "bg-purple-200 text-purple-600" :
                       status === "rejected" ? "bg-red-200 text-red-600" :
                       status === "cancelled" || status === 0 ? "bg-red-200 text-red-600" :
                       "bg-gray-200 text-gray-600"
            }
        }
    }
</script>

<style scoped>

</style>
