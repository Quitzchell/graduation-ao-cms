import {useRef, useState} from "react";

import {useRouter} from "next/navigation";

import {Button} from "@/components/ui/button";
import {Card, CardContent, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";


export default function LoginForm({toggleForm}) {
    const apiUrl = process.env.NEXT_PUBLIC_API_URL;
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const router = useRouter();
    const formRef = useRef(null);

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch(`${apiUrl}/api/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({username, password}),
            });

            if (response.ok) {
                const data = await response.json();
                localStorage.setItem('auth_token', data);
                router.push('/home');
            } else {
                const errorData = await response.json();
                console.error('Login error:', errorData);
            }
        } catch (error) {
            console.error('Fetch error:', error);
        }
    };

    const handleLoginClick = () => {
        formRef.current.dispatchEvent(new Event('submit', {bubbles: true}));
    };

    return (
        <Card className="w-100">
            <CardHeader>
                <CardTitle>Login</CardTitle>
            </CardHeader>
            <CardContent>
                <form ref={formRef} onSubmit={handleSubmit}>
                    <div className="grid w-full items-center gap-4">
                        <div className="flex flex-col space-y-1.5">
                            <Label htmlFor="username">Username</Label>
                            <Input
                                type="text"
                                name="username"
                                placeholder="Username"
                                value={username}
                                onChange={(e) => setUsername(e.target.value)}
                            />
                        </div>
                        <div className="flex flex-col space-y-1.5">
                            <Label htmlFor="password">Password</Label>
                            <Input
                                type="password"
                                name="password"
                                placeholder="Password"
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                            />
                        </div>
                    </div>
                </form>
            </CardContent>
            <CardFooter className={"grid grid-cols-2 gap-x-6"}>
                <Button type="button" onClick={toggleForm} className={"w-full"}>Reset password</Button>
                <Button type="button" onClick={handleLoginClick} className={"w-full"}>Login</Button>
            </CardFooter>
        </Card>
    )
}
