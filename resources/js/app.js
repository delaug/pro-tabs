/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */


import {AuthState} from "./context/auth/AuthState";

require('./base');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import React, { Suspense } from 'react';
import ReactDOM from 'react-dom';
import {createBrowserHistory} from "history";
import {Router, Route, Switch} from "react-router-dom";
import './i18n'

import {AboutPage} from "./views/AboutPage/AboutPage";
import {HomePage} from "./views/HomePage/HomePage";
import {SignInPage} from "./views/SignInPage/SignInPage";
import {SignUpPage} from "./views/SignUpPage/SignUpPage";
import {NotFoundPage} from "./views/404Page/404Page";
import {appLanguages} from "./variables/general";

var hist = createBrowserHistory();
const base = '/:locale('+appLanguages.join('|')+')?'

ReactDOM.render(
    <React.StrictMode>
    <Suspense fallback={<div uk-spinner="ratio: 1"></div>}>
        <AuthState>
            <Router history={hist}>
                <Switch>
                    <Route path={base + "/"} component={HomePage} exact/>
                    <Route path={base + "/about"} component={AboutPage} exact/>
                    <Route path={base + "/sign-in"} component={SignInPage} exact/>
                    <Route path={base + "/sign-up"} component={SignUpPage} exact/>
                    <Route path="*" component={NotFoundPage} exact/>
                </Switch>
            </Router>
        </AuthState>
    </Suspense>
    </React.StrictMode>
    ,document.getElementById("root")
);

