import i18n from 'i18next'
import { initReactI18next  } from 'react-i18next'
import LanguageDetector from 'i18next-browser-languagedetector'

import translationEN from './locales/en/translation.json'
import translationRU from './locales/ru/translation.json'
import {appDefaultLanguage, appLanguages} from "./variables/general";

// the translations
const resources = {
    en: {
        translation: translationEN
    },
    ru: {
        translation: translationRU
    }
}

/*i18n.on('languageChanged', function (lng) {
    // if the language we switched to is the default language we need to remove the /en from URL
    if (lng === i18n.options.fallbackLng[0]) {
        if (window.location.pathname.includes('/' + i18n.options.fallbackLng[0])) {
            const newUrl = window.location.pathname.replace('/' + i18n.options.fallbackLng[0], '')
            window.location.replace(newUrl)
        }
    }
})*/

i18n
    .use(initReactI18next ) // passes i18n down to react-i18next
    .use(LanguageDetector )
    .init({
        resources,
        whitelist: appLanguages,
        fallbackLng: appDefaultLanguage,
        //lng: appDefaultLanguage,
        detection: {
            order: ['path'],
            lookupFromPathIndex: 0,
            checkWhitelist: true
        },
        interpolation: {
            escapeValue: false
        },
        //debug: true
    });

export default i18n;

export const GetLocaleURL = path => {
    if(i18n.language != appDefaultLanguage)
        return  '/'+i18n.language+path
    else
        return path
}
