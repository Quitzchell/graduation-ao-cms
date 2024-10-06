"use client"

import {useState} from "react";

import Link from "next/link";

import {Hamburger} from "@/components/icons";
import {Button} from "@/components/ui/button";
import {Sheet, SheetContent, SheetOverlay, SheetTrigger} from "@/components/ui/sheet";
import {cn} from "@/lib/utils";


export default function MobileMenu({menuItems}) {
    const [isOpen, setIsOpen] = useState(false);
    const closeSheet = () => setIsOpen(false);

    return (
        <Sheet open={isOpen} onOpenChange={setIsOpen}>
            <SheetOverlay className="bg-neutral-900/50"/>
            <SheetTrigger asChild>
                <Button
                    className={cn("lg:hidden")}
                    variant={"ghost"}
                    onClick={() => setIsOpen(true)}
                >
                    <Hamburger width={25} height={20} className={"text-red-300"}/>
                </Button>
            </SheetTrigger>
            <SheetContent
                side="right"
                className="w-5/6 shadow-lg bg-neutral-0"
            >
                <div className="grid gap-6 text-lg font-medium">
                    {menuItems.map(({name, uri}, key) => (
                        <Link
                            key={key}
                            href={`/${uri}`}
                            className="text-lg font-bold text-neutral-900"
                            onClick={closeSheet}
                        >
                            {name}
                        </Link>
                    ))}
                </div>
            </SheetContent>
        </Sheet>
    );

}
