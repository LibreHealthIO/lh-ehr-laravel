import Vue from "vue"
import VueI18n from "vue-i18n"
import getBrowserLocale from "~/utils/i18n/get-browser-locale"
import { supportedLocalesInclude } from "~/utils/i18n/supported-locales"
import {
    getChoiceIndex,
    setDefaultChoiceIndexGet
} from "~/utils/i18n/choice-index-for-plural"
import dateTimeFormats from "~/locales/date-time-formats"
import numberFormats from "~/locales/number-formats"
import Locales from '~/locales/translations';

const EventBus = new Vue();
Vue.use(VueI18n);
function getStartingLocale() {
    return window.default_locale || "en"
    // TODO decide on whether to use browser locale or not
    // const browserLocale = getBrowserLocale({ countryCodeOnly: true });
    //
    // if (supportedLocalesInclude(browserLocale)) {
    //     return browserLocale
    // } else {
    //     return window.default_locale || "en"
    // }
}

setDefaultChoiceIndexGet(VueI18n.prototype.getChoiceIndex);

VueI18n.prototype.getChoiceIndex = getChoiceIndex;

const startingLocale = getStartingLocale();

const i18n = new VueI18n({
    locale: startingLocale,
    fallbackLocale: window.fallback_locale || "en",
    messages: Locales,
    dateTimeFormats,
    numberFormats
});

const loadedLanguages = [];

export function loadLocaleMessagesAsync(locale) {
    EventBus.$emit("i18n-load-start");

    if (loadedLanguages.length > 0 && i18n.locale === locale) {
        EventBus.$emit("i18n-load-complete");
        return Promise.resolve(locale)
    }

    // If the language was already loaded
    if (loadedLanguages.includes(locale)) {
        i18n.locale = locale;
        EventBus.$emit("i18n-load-complete");
        return Promise.resolve(locale)
    }

    // If the language hasn't been loaded yet
    return import(`~/locales/translations.js`).then(messages => {
        let localeMessages = messages.default[locale];
        if (localeMessages === null) {
            localeMessages = messages.default["en"]
        }
        i18n.setLocaleMessage(locale, localeMessages);

        loadedLanguages.push(locale);

        i18n.locale = locale;

        EventBus.$emit("i18n-load-complete");
        return Promise.resolve(locale)
    })
}

export default i18n
