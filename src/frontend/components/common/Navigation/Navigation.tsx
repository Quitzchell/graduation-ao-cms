import Link from "next/link";

import MobileMenu from "@/components/common/Navigation/MobileMenu";
import {fetchMenu} from "@/lib/fetchUtils";
import {cn} from "@/lib/utils";

export default async function Navigation() {
    const menuItems = await fetchMenu();

    return (
        <nav
            className="bg-neutral-0 ">
            <div className="container flex items-center justify-between z-50 h-12">
                <Link href={'/home'}>
                    <h1 className={"text-2xl font-bold text-red-300"}>Bonaparte</h1>
                </Link>
                <NavigationWrapper className={"flex lg:hidden"}>
                    <MobileMenu menuItems={menuItems}/>
                </NavigationWrapper>
            </div>
        </nav>
    );
}


function NavigationWrapper({children, className}) {
    return (
        <div className={cn("flex items-center gap-x-5 md:gap-x-11 lg:gap-x-9", className)}>
            {children}
        </div>
    );
}
