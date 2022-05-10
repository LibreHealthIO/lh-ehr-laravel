<template>
    <div class="relative">
        <button
            type="button"
            :class="getLanguageColor"
            class="flex items-center border-none outline-none focus:outline-none focus:border-transparent"
            @click="toggleVisibility"
            @keydown.space.exact.prevent="toggleVisibility"
            @keydown.esc.exact="hideDropdown"
            @keydown.shift.tab="hideDropdown"
            @keydown.up.exact.prevent="startArrowKeys"
            @keydown.down.exact.prevent="startArrowKeys"
        >
            <img :src="`/flags/${$i18n.locale}.svg`" alt="flag" class="fill-current h-4 w-4">
            <span class="mx-2 text-sm whitespace-no-wrap">{{ $i18n.locale.toUpperCase() }}</span>
            <svg fill="currentColor" class="-ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"></path></svg>
        </button>
        <transition name="dropdown-fade" class="z-999">
            <ul v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                class="absolute z-500 font-normal xs:left-0 lg:right-0 text-gray-800
                bg-white dark:bg-dark-2 shadow overflow-hidden rounded w-48 border mt-2 py-1 lg:z-100">
                <li v-for="locale in locales" :key="locale.code">
                    <a href="#"
                       @click.prevent="setLocale(locale.code)"
                       ref="account"
                       class="flex items-center px-4 py-2 text-sm whitespace-no-wrap hover:bg-gray-100 dark:hover:bg-dark-3"
                       @keydown.up.exact.prevent=""
                       @keydown.tab.exact="focusNext(false)"
                       @keydown.down.exact.prevent="focusNext(true)"
                       @keydown.esc.exact="hideDropdown">
                        <img :alt="locale.code" :src="`/flags/${locale.code}.svg`" class="h-4 w-4">
                        <span class="ltr:ml-2 rtl:mr-2">{{locale.name}}</span>
                    </a>
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway';
import { getSupportedLocales } from "~/utils/i18n/supported-locales"
import {loadLocaleMessagesAsync} from "~/i18n";
import {setDocumentDirectionPerLocale, setDocumentLang, setDocumentTitle} from "~/utils/i18n/document";

export default {
    name: "LanguageSwitcher",
    mixins: [ clickaway ],
    props: {
        dropDownColor: null,
    },
    data() {
        return {
            isVisible: false,
            focusedIndex: 0,
            locales: getSupportedLocales()
        }
    },
    computed: {
        getLanguageColor() {
            return this.dropDownColor !== null ? this.dropDownColor : "text-black";
        },
    },
    methods: {
        toggleVisibility() {
            this.isVisible = !this.isVisible;
        },
        hideDropdown() {
            this.isVisible = false;
            this.focusedIndex = 0
        },
        startArrowKeys() {
            if (this.isVisible) {
                this.$refs.account.focus()
                this.$refs.dropdown.children[0].children[0].focus()
            }
        },
        focusPrevious(isArrowKey) {
            this.focusedIndex = this.focusedIndex - 1;
            if (isArrowKey) {
                this.focusItem()
            }
        },
        focusNext(isArrowKey) {
            this.focusedIndex = this.focusedIndex + 1;
            if (isArrowKey) {
                this.focusItem()
            }
        },
        focusItem() {
            this.$refs.dropdown.children[this.focusedIndex].children[0].focus()
        },
        setLocale(locale) {
            this.$inertia.visit(this.route('locale.set', locale));
            loadLocaleMessagesAsync(locale).then(() => {
                setDocumentLang(locale)
                setDocumentDirectionPerLocale(locale)
                setDocumentTitle(locale)
            });
            this.hideDropdown()
        }
    }
}
</script>
