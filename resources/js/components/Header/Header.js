import React, {useContext} from 'react'
import {appName, appLanguages, appDefaultLanguage} from '../../variables/general'
import {NavLink, useHistory} from "react-router-dom";
import {AuthContext} from "../../context/auth/authContext";
import {useTranslation} from "react-i18next";
import {GetLocaleURL} from "../../i18n";

export const Header = () => {
    const history = useHistory()
    const {t, i18n} = useTranslation()

    const isActive = link => {
        return history.location.pathname === link ? 'uk-active' : ''
    }
    const {token, user, logout} = useContext(AuthContext)

    const handlerLogout = () => {
        logout().then(response => {
            UIkit.notification({
                message: `Goodbye, ${user.name}`,
                status: 'success',
                pos: 'top-right',
                timeout: 2000
            });
        }).catch(error => {
            UIkit.notification({
                message: error.response.data,
                status: 'danger',
                pos: 'top-right',
                timeout: 2000
            });
        })
    }

    const handlerChangeLanguage = lng => {
        let pattern = appLanguages.map(i => ('(^/' + i + ')')).join('|')
        let reg = new RegExp(pattern)
        let l = history.location.pathname.replace(reg, '')

        i18n.changeLanguage(lng)

        history.push(GetLocaleURL(l))
    }

    return (
        <div className="uk-navbar-container" uk-navbar>
            <div className="uk-container">
                <nav className="uk-navbar">
                    <div className="uk-navbar-left">

                        <NavLink
                            className="uk-navbar-item uk-logo"
                            to={GetLocaleURL('/')}
                            exact
                        >
                            {appName}
                        </NavLink>

                        <ul className="uk-navbar-nav uk-visible@m">
                            <li className={isActive(GetLocaleURL('/'))}>
                                <NavLink
                                    to={GetLocaleURL('/')}
                                    exact
                                >
                                    Tabs
                                </NavLink>
                            </li>
                            <li><a href="#">New</a></li>
                            <li><a href="#">Popular</a></li>
                            <li className={isActive(GetLocaleURL('/about'))}>
                                <NavLink
                                    to={GetLocaleURL('/about')}
                                    exact
                                >
                                    About
                                </NavLink>
                            </li>
                        </ul>

                    </div>
                    <div className="uk-navbar-right">
                        <div className="uk-navbar-item uk-visible@m">
                            <a className="uk-navbar-toggle" href="#" aria-expanded="false">
                                <span className={'tm-flag ' + i18n.language}></span>{i18n.language}
                            </a>
                            <div uk-dropdown="mode: click" className="tm-lang-dropdown">
                                <ul className="uk-nav uk-dropdown-nav">
                                    {appLanguages.map((lng) => (
                                        <li key={lng}>
                                            <a onClick={() => handlerChangeLanguage(lng)}><span
                                                className={'tm-flag ' + lng}></span>{lng}</a>
                                        </li>
                                    ))}
                                </ul>
                            </div>

                            <a className="uk-navbar-toggle" href="#" aria-expanded="false">
                                <span className="uk-margin-small-right">{user ? user.name : 'Menu'}</span>
                                <span className="uk-margin-small-right uk-icon" uk-icon="user"></span>
                            </a>
                            <div className="uk-navbar-dropdown uk-navbar-dropdown-bottom-right"
                                 uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !nav; flip: x"
                                 style={{left: '380px', top: '80px'}}
                            >
                                {(!token) ? (
                                    <ul className="uk-nav uk-nav-default uk-nav-parent-icon">
                                        <li className="uk-nav-header">Menu</li>
                                        <li>
                                            <NavLink
                                                to={GetLocaleURL('/sign-up')}
                                                exact
                                            >
                                                <span className="uk-margin-small-right" uk-icon="icon: user"></span>
                                                Sign Up
                                            </NavLink>
                                        </li>
                                        <li>
                                            <NavLink
                                                to={GetLocaleURL('/sign-in')}
                                                exact
                                            >
                                                <span className="uk-margin-small-right" uk-icon="icon: sign-in"></span>
                                                Sign In
                                            </NavLink>
                                        </li>
                                    </ul>
                                ) : (
                                    <ul className="uk-nav uk-nav-default uk-nav-parent-icon">
                                        <li className="uk-nav-header">Menu</li>
                                        <li>
                                            <a
                                                href="#"
                                                onClick={handlerLogout}
                                            >
                                                <span className="uk-margin-small-right" uk-icon="icon: sign-out"></span>
                                                Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                )}
                            </div>
                        </div>

                        <a uk-navbar-toggle-icon=""
                           className="uk-navbar-toggle uk-hidden@m uk-icon uk-navbar-toggle-icon" href="#offcanvas-menu"
                           uk-toggle="" aria-expanded="false"></a>

                    </div>
                </nav>
                <div id="offcanvas-menu" uk-offcanvas="mode: reveal" className="uk-offcanvas uk-open">
                    <div className="uk-offcanvas-reveal">
                        <div className="uk-offcanvas-bar uk-flex uk-flex-column uk-text-center">

                            <button className="uk-offcanvas-close uk-close-large uk-icon uk-close" type="button"
                                    uk-close=""></button>

                            <ul className="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical uk-nav-parent-icon"
                                uk-nav="">
                                <li className={isActive(GetLocaleURL('/'))}>
                                    <NavLink
                                        to={GetLocaleURL('/')}
                                        exact
                                    >
                                        {appName}
                                    </NavLink>
                                </li>
                                <li><a href="#">Tabs</a></li>
                                <li><a href="#">New</a></li>
                                <li><a href="#">Popular</a></li>
                                <li className={isActive(GetLocaleURL('/about'))}>
                                    <NavLink
                                        to={GetLocaleURL('/about')}
                                        exact
                                    >
                                        About
                                    </NavLink>
                                </li>


                                <li className="uk-nav-divider"></li>
                                <li className="uk-nav-header">{user ? user.name : 'Menu'}</li>
                                {(!token) ? (
                                    <>
                                        <li>
                                            <NavLink
                                                to={GetLocaleURL('/sign-up')}
                                                exact
                                            >
                                                <span className="uk-margin-small-right" uk-icon="icon: user"></span>
                                                Sign Up
                                            </NavLink>
                                        </li>
                                        <li>
                                            <NavLink
                                                to={GetLocaleURL('/sign-in')}
                                                exact
                                            >
                                                <span className="uk-margin-small-right" uk-icon="icon: sign-in"></span>
                                                Sign In
                                            </NavLink>
                                        </li>
                                    </>
                                ) : (
                                    <>
                                        <li>
                                            <a
                                                href="#"
                                                onClick={handlerLogout}
                                            >
                                                <span className="uk-margin-small-right" uk-icon="icon: sign-out"></span>
                                                Sign Out
                                            </a>
                                        </li>
                                    </>
                                )}
                            </ul>

                            <div>
                                <div className="uk-grid-small uk-child-width-auto uk-flex-inline uk-grid" uk-grid="">
                                    {appLanguages.map((lng) => (
                                        <div key={lng}>
                                            <a className="uk-icon-button uk-icon" onClick={() => handlerChangeLanguage(lng)}>
                                                <span className={'tm-flag tm-flag-icon ' + lng}></span>
                                            </a>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    )
}
