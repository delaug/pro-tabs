import React, {useContext} from 'react'
import {appName} from '../../variables/general'
import {NavLink, useHistory} from "react-router-dom";
import {AuthContext} from "../../context/auth/authContext";

export const Header = () => {
    const history = useHistory()
    const isActive = link => {return history.location.pathname === link ? 'uk-active' : ''}
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

    return (
        <nav className="uk-navbar-container">
            <div className="uk-container">
                <div uk-navbar="" className="uk-navbar">
                    <div className="uk-navbar-left">

                        <NavLink
                            className="uk-navbar-item uk-logo"
                            to={'/'}
                            exact
                        >
                            {appName}
                        </NavLink>

                        <ul className="uk-navbar-nav">
                            <li className={isActive('/')}>
                                <NavLink
                                    to={'/'}
                                    exact
                                >
                                    Tabs
                                </NavLink>
                            </li>
                            <li><a href="#">New</a></li>
                            <li><a href="#">Popular</a></li>
                            <li className={isActive('/about')}>
                                <NavLink
                                    to={'/about'}
                                    exact
                                >
                                    About
                                </NavLink>
                            </li>
                        </ul>

                    </div>
                    <div className="uk-navbar-right">

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
                                        to={'/sign-up'}
                                        exact
                                    >
                                        <span className="uk-margin-small-right" uk-icon="icon: user"></span>
                                        Sign Up
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink
                                        to={'/sign-in'}
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
                                        onClick={ handlerLogout }
                                    >
                                        <span className="uk-margin-small-right" uk-icon="icon: sign-out"></span>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                        )}


                        </div>
                    </div>
                </div>
            </div>
        </nav>
    )
}
