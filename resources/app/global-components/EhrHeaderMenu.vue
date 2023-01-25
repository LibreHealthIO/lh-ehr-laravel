<template>
    <div
        :id="id"
        class="dropdown inline-block relative" @mouseleave="is_open = false">
        <div @mouseover="is_open = true" :class="isActiveClass('dashboard.calendar')">
            <span class="mr-0.5">{{ label }}</span>
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
        </div>
        <transition
            enter-active-class="transition ease-out duration-100"
            enter-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95">
            <div
                v-show="is_open"
                class="dropdown-menu absolute border-t-2 border-theme-1 py-1 w-48 bg-white shadow-lg z-50">
                <div class="relative bg-white">
                    <slot/>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "EhrHeaderMenu",
    props: {
        label: String,
        id: String,
    },
    data() {
        return {
            is_open: false
        }
    },
    methods: {
        url() {
            return location.pathname.substr(1);
        },
        isUrl(...urls) {
            if (urls[0] === '') {
                return this.url() === ''
            }
            return urls.filter(url => this.url().startsWith(url)).length
        },
        isActiveClass: function(url) {
            return this.isUrl(url) ?
                'mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' +
                'inline-flex items-center bg-theme-1 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-theme-1' +
                'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100 cursor-pointer':

                'mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' +
                'inline-flex items-center bg-gray-800 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 ' +
                'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100 cursor-pointer'
        },
        isSubMenuActive: function (url) {
            return this.isUrl(url) ?
                'block px-4 py-2 text-sm text-gray-700 bg-gray-100 hover:bg-gray-100' :
                'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'
        }
    },
}
</script>
