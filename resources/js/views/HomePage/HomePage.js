import React, {Fragment} from 'react'
import {Header} from "../../components/Header/Header";
import {Footer} from "../../components/Footer/Footer";

export const HomePage = () => {
    return (
        <>
            <Header/>
            <div className="content uk-container">
                <h1>Test</h1>
            </div>
            <Footer/>
        </>
    )
}
