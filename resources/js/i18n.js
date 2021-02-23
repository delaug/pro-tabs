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

// Return link with locale /*LANGUAGE*/about
export const GetLocaleURL = path => {
    if(i18n.language != appDefaultLanguage)
        return  '/'+i18n.language+path
    else
        return path
}
