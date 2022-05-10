<template>
    <div>
        <div v-show="isOpen" class="md:hidden" style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; z-index: 99998; background: black; opacity: .5" > </div>
        <aside v-if="isOpen"
               style="position: absolute; z-index: 99999;"
               class="transform block md:hidden top-0 bottom-0 left-0 w-72 bg-white dark:bg-dark-2 shadow-xl grid grid-rows-6 fixed h-screen max-h-screen ease-in-out duration-500 z-30"
               :class="!isOpen ? 'translate-x-full ' : 'translate-x-0'">
            <header :class="auth ? 'row-span-2' : 'row-span-1 gap-8'" class="space-y-1 shadow-lg py-auto flex flex-col px-4 bg-success">
                <div class="flex flex-row items-center mt-2" :class="auth ? 'justify-between' : 'justify-end'">
                    <inertia-link v-if="auth" :href="route('logout')">
                        <icon :class="'text-white'" :name="'logout'" />
                    </inertia-link>
                    <button @click="toggleMenu" aria-label="Close Menu" class="h-6 w-6 flex justify-center rounded-full p-1 bg-white outline-none focus:outline-none">
                        <Icon name="close"/>
                    </button>
                </div>
                <div v-if="auth" >
                    <div class="flex flex-col items-center justify-center">
                        <img class="h-24 w-24 object-cover cursor-pointer rounded-full" :src="auth.profile_image" :alt="auth.username">
                        <p class="text-white font-bold capitalize text-md">{{ auth.username }}</p>
                    </div>
                    <div class="flex flex-row items-center justify-between">
                        <inertia-link  :href="route('listing:add')" class="menu-item">
                            <icon class="p-1" name="camera"/>
                            sell
                        </inertia-link>
                        <inertia-link :href="route('conversations')" class="menu-item">
                            <icon class="p-1" name="chat"/> chat
                        </inertia-link>
                    </div>
                </div>
                <div  v-else class="flex flex-row items-end justify-between">
                    <inertia-link  :href="route('login')" class="menu-item">
                        <icon name="login"/> Login
                    </inertia-link>
                    <inertia-link :href="route('register')" class="menu-item">
                        <icon name="user-add"/> Signup
                    </inertia-link>
                    <inertia-link :href="route('listing:add')" class="menu-item">
                        <icon name="camera"/> Sell
                    </inertia-link>
                </div>
            </header>

            <div :class="auth ? 'row-span-4' : 'row-span-5'" class="overflow-y-auto row-span-4 bg-white overflow-x-hidden px-1 py-2 overflow-scroll-container flex-grow">
                <div class="my-3 mx-3">
                    <search-input />
                </div>
                <div class="border-b"></div>
                <div>
                    <p class="text-sm px-3 mt-2 text-gray-700 font-semibold leading-5 uppercase">
                        Top Categories
                    </p>
                    <ul class="px-3">
                        <li @click="categories_children(index, category)" class="py-2 hover:text-success text-gray-700 select-none flex items-center justify-between cursor-pointer text-sm" v-for="(category, index) in categories" :key="index">
                            <span> {{ category.name }} </span>
                            <icon class="h-3 w-3" name="cheveron-right" />
                        </li>
                    </ul>
                </div>
            </div>

            <div v-if="sub_categories.length > 0"
                 :class="sub_categories.length !== 0 ? 'translate-x-full ' : 'translate-x-0'"
                 class="bg-white w-full absolute h-screen top-0 bottom-0 ease-in-out duration-500 z-50">
                <header class="border-b h-16 py-auto flex px-3 bg-gray-50">
                    <div class="flex flex-row items-center mt-2">
                        <button @click="sub_categories = [] " aria-label="Close Categories" class="h-6 flex items-center outline-none focus:outline-none">
                            <Icon name="cheveron-left"/> <span class="ml-2 text-sm">{{ current_category }}</span>
                        </button>
                    </div>
                </header>
                <div>
                    <ul class="px-3">
                        <li @click="$inertia.get('/items/search', { category: category.slug })" class="py-2 hover:text-success text-gray-700 select-none flex items-center justify-between cursor-pointer text-sm" v-for="(category, index) in sub_categories" :key="index">
                            {{ category.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</template>

<script>
import Icon from "../../global-components/Icon"
import axios from 'axios'
import SearchInput from "./SearchInput"
export default {
    name: "MobileNav",
    components: {
        SearchInput,
        Icon,
    },
    props: {
        auth: Object,
        categories: Array
    },
    data() {
        return {
            sub_categories: [],
            current_category: null,
            search: null,
            isOpen: false,
        }
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen
        },

        categories_children(index, category){
            this.current_category = category.name
            if (this.$store.keyExist(`category_${category.id}`)) {
                this.sub_categories = this.$store.getStorage(`category_${category.id}`)
            }
            else {
                let formData = new FormData
                formData.append('category', category.id)
                formData.append('children', true)
                axios.post(this.route('listing:categories'), formData)
                    .then(res => {
                        if (res.data['categories'].length > 0) {
                            this.sub_categories = res.data['categories']
                            this.$store.addStorage(`category_${id}`, this.sub_categories)
                        }
                        else {
                            this.toggleMenu()
                            this.$inertia.get('/items/search', { category: category.slug })
                        }
                    })
                    .catch( res => {
                        this.toggleMenu()
                        this.$inertia.get('/items/search', { category: category.slug })
                    })
            }
        }
    },
    watch: {
        isOpen: {
            immediate: true,
            handler(isOpen) {
                //this.isOpen = is
            }
        }
    },
    mounted() {
        document.addEventListener("keydown", e => {
            if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
        });
    }
}
</script>

<style scoped>
.menu-item {
    @apply flex items-center text-white mb-1 gap-1 text-xs font-bold uppercase block;
}
</style>
