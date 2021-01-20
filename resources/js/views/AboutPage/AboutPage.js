import React, {Fragment} from 'react'
import {Header} from "../../components/Header/Header";
import {Footer} from "../../components/Footer/Footer";
import {useTranslation } from 'react-i18next'
import {NavLink} from "react-router-dom";
import {GetLocaleURL} from '../../i18n';


export const AboutPage = () => {
    const {t, i18n} = useTranslation()

    return (
        <>
            <Header/>
            <div className="content uk-container">
                <h1>About</h1>
                <p>{t('home')}</p>
                <NavLink to={GetLocaleURL('/')}>Home</NavLink>
            </div>
            <Footer/>
        </>
    )
}
