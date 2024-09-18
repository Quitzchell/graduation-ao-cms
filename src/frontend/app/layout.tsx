import type { Metadata } from "next";
import localFont from "next/font/local";

import "./globals.css";
import {Card} from "@/components/elements/Card";
import {CardList} from "@/components/elements/lists/CardList";

const geistSans = localFont({
    src: "./fonts/GeistVF.woff",
    variable: "--font-geist-sans",
    weight: "100 900",
});
const geistMono = localFont({
    src: "./fonts/GeistMonoVF.woff",
    variable: "--font-geist-mono",
    weight: "100 900",
});

export const metadata: Metadata = {
    title: "SEO title",
    description: "SEO description",
};

export default function RootLayout({
    children,
}: Readonly<{
    children: React.ReactNode;
}>) {
    return (
        <html lang="en">
            <body className={`${geistSans.variable} ${geistMono.variable} antialiased`}>
                {children}

            <div className="py-20 px-10">
                <CardList >
                    <Card />
                    <Card />
                    <Card />
                </CardList>
            </div>
            </body>
        </html>
    );
}
