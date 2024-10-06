'use client';

import {useState} from 'react';


import LoginForm from "@/components/authentication/LoginForm";
import ResetPasswordForm from "@/components/authentication/ResetPasswordForm";
import Title from "@/components/authentication/Title";

export default function Page() {
    const [isLoginForm, setIsLoginForm] = useState(true);

    const toggleForm = () => {
        setIsLoginForm(prevIsLoginForm => !prevIsLoginForm);
    };

    return (
        <section className="container flex justify-center items-center h-dvh">
            <Title/>
            {isLoginForm
                ? <LoginForm toggleForm={() => toggleForm()}/>
                : <ResetPasswordForm toggleForm={() => toggleForm()}/>
            }
        </section>
    );
}
