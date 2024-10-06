"use client"

import {useRef, useState} from 'react';

import Title from "@/components/authentication/Title";
import {Button} from "@/components/ui/button";
import {Card, CardContent, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";

export default function Page() {
    const apiUrl = process.env.NEXT_PUBLIC_API_URL
    const [formData, setFormData] = useState({
        username: '',
        email: '',
        password: '',
        password_confirmation: ''
    });
    const formRef = useRef(null);

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await fetch(`${apiUrl}/api/register`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                alert('User registered successfully!');
            } else {
                const errorData = await response.json();
                console.error('Error:', errorData);
            }
        } catch (error) {
            console.error('Fetch error:', error);
        }
    };

    const handleButtonClick = () => {
        formRef.current.dispatchEvent(new Event('submit', {bubbles: true}));
    };

    return (
        <section className="container flex justify-center items-center h-dvh">
            <Title />
            <Card className="w-100">
                <CardHeader>
                    <CardTitle>Register</CardTitle>
                </CardHeader>
                <CardContent>
                    <form ref={formRef} onSubmit={handleSubmit}>
                        <div className="grid w-full items-center gap-4">
                            <div className="flex flex-col space-y-1.5">
                                <Label htmlFor="Email">Email</Label>
                                <Input type="email" name="email" placeholder="Email"
                                       onChange={e => setFormData({...formData, email: e.target.value})}/>
                            </div>
                            <div className="flex flex-col space-y-1.5">
                                <Label htmlFor="userName">Username</Label>
                                <Input type="text" name="username" placeholder="Username"
                                       onChange={e => setFormData({...formData, username: e.target.value})}/>
                            </div>
                            <div className="flex flex-col space-y-1.5">
                                <Label htmlFor="password">Password</Label>
                                <Input type="password" name="password" placeholder="Password"
                                       onChange={e => setFormData({...formData, password: e.target.value})}/>
                            </div>

                            <div className="flex flex-col space-y-1.5">
                                <Label htmlFor="password">Password</Label>
                                <Input type="password" name="password_confirmation" placeholder="Confirm Password"
                                       onChange={e => setFormData({
                                           ...formData,
                                           password_confirmation: e.target.value
                                       })}/>
                            </div>
                        </div>
                    </form>
                </CardContent>
                <CardFooter className="flex justify-center">
                    <Button type="button" onClick={handleButtonClick}>Register</Button>
                </CardFooter>
            </Card>
        </section>
    );
}
