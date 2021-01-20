import React, {useState, useContext} from 'react'
import {appName} from "../../variables/general"
import {NavLink, useHistory} from "react-router-dom";
import {AuthContext} from "../../context/auth/authContext";
import {GetLocaleURL} from "../../i18n";

const useRegistrationForm = () => {
    const [values, setValues] = useState({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        device_name: navigator.userAgent,
    })

    const [errors, setErrors] = useState({})
    const [isLoading, setLoading] = useState(false)
    const {register} = useContext(AuthContext)
    const history = useHistory()

    const handleChange = e => {
        const {name, value} = e.target
        setValues({
            ...values,
            [name]: value
        })
    }

    const handleSubmit = e => {
        e.preventDefault()

        let errors = validateValues(values)
        setErrors(errors)

        if (Object.keys(errors).length === 0) {
            setLoading(true)
            register(values)
                .then(response => {
                    setLoading(false)
                    UIkit.notification({
                        message: `Welcome, ${response.data.user.name}`,
                        status: 'success',
                        pos: 'top-right',
                        timeout: 2000
                    });
                    history.push(GetLocaleURL('/'))
                })
                .catch(error => {
                    setLoading(false)
                    if(error.response.data.errors != undefined)
                        setErrors(error.response.data.errors)
                    else
                        UIkit.notification({
                            message: error.response.data.error,
                            status: 'danger',
                            pos: 'top-right',
                            timeout: 2000
                        });
                })
        }
    }

    const validateValues = values => {
        let errors = {}

        if (!values.name.trim()) {
            errors.name = 'Name is required'
        }

        if (!values.email) {
            errors.email = 'Email is required'
        } else if (!/\S+@\S+\.\S+/.test(values.email)) {
            errors.email = 'Email address is invalid'
        }

        if (!values.password) {
            errors.password = 'Password is required'
        } else if (values.password.length < 6) {
            errors.password = 'Password must be more than 6 characters'
        }

        if (!values.password_confirmation) {
            errors.password_confirmation = 'Password confirm is required'
        } else if (values.password_confirmation !== values.password) {
            errors.password_confirmation = 'Passwords do not match'
        }

        return errors
    }

    return {values, errors, isLoading, handleChange, handleSubmit}
}

export const SignUpPage = () => {
    const {values, errors, isLoading, handleChange, handleSubmit} = useRegistrationForm()

    return (
        <div className="uk-position-center">
            <div className="uk-card uk-card-default uk-card-hover uk-card-body uk-width-large">
                <NavLink
                    className="uk-flex uk-flex-center"
                    to={GetLocaleURL('/')}
                    exact
                >
                    <img src="/favicon.ico" alt=""/>
                </NavLink>
                <p className="uk-card-title uk-flex uk-flex-center"> Sign up to {appName}</p>
                <form className="uk-form-stacked">
                    <div className="uk-margin">
                        <label className="uk-form-label" htmlFor="name">Name</label>
                        <div className="uk-form-controls">
                            <div className="uk-form-controls">
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    className={"uk-input " + (errors.name && "uk-form-danger")}
                                    placeholder="Name"
                                    value={values.name}
                                    onChange={handleChange}
                                />
                                {errors.name && <small className={errors.name && "uk-text-danger"}>{errors.name}</small>}
                            </div>
                        </div>
                    </div>

                    <div className="uk-margin">
                        <label className="uk-form-label" htmlFor="email">Email</label>
                        <div className="uk-form-controls">
                            <div className="uk-form-controls">
                                <input
                                    type="text"
                                    id="email"
                                    name="email"
                                    className={"uk-input " + (errors.email && "uk-form-danger")}
                                    placeholder="Email"
                                    value={values.email}
                                    onChange={handleChange}
                                />
                                {errors.email && <small className={errors.email && "uk-text-danger"}>{errors.email}</small>}
                            </div>
                        </div>
                    </div>

                    <div className="uk-margin">
                        <label className="uk-form-label" htmlFor="password">Password</label>
                        <div className="uk-form-controls">
                            <div className="uk-form-controls">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    className={"uk-input " + (errors.password && "uk-form-danger")}
                                    placeholder="Password"
                                    value={values.password}
                                    onChange={handleChange}
                                />
                                {errors.password && <small className={errors.password && "uk-text-danger"}>{errors.password}</small>}
                            </div>
                        </div>
                    </div>

                    <div className="uk-margin">
                        <label className="uk-form-label" htmlFor="password_confirmation">Confirmation</label>
                        <div className="uk-form-controls">
                            <div className="uk-form-controls">
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    className={"uk-input " + (errors.password_confirmation && "uk-form-danger")}
                                    placeholder="Password confirmation"
                                    value={values.password_confirmation}
                                    onChange={handleChange}
                                />
                                {errors.password_confirmation && <small className={errors.password_confirmation && "uk-text-danger"}>{errors.password_confirmation}</small>}
                            </div>
                        </div>
                    </div>

                    <div className="uk-margin">
                        { !isLoading ? (
                            <button
                                className="uk-button uk-button-primary uk-width-1-1"
                                type="button"
                                onClick={handleSubmit}
                            >
                                Sign Up
                            </button>
                        ) : (
                            <button className="uk-button uk-button-primary uk-width-1-1" type="button" disabled>
                                <span className="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                &nbsp;Loading...
                            </button>
                        )}
                    </div>
                </form>
            </div>
        </div>
    )
}
