import MobileMenu from "@/components/common/Navigation/MobileMenu";
import { fetchMenu } from "@/lib/fetchUtils";
import { cn } from "@/lib/utils";

export default async function Navigation() {
    const menuItems = await fetchMenu();

    return (
            <nav className="bg-neutral-0 left-0 shadow-lg top-0 z-50 flex h-20 w-full items-center justify-between px-5 md:px-16 lg:px-28">
                <h1 className={"text-2xl font-bold text-red-300"}>Bonaparte</h1>
                <NavigationWrapper className={"flex lg:hidden"}>
                    <MobileMenu menuItems={menuItems} />
                </NavigationWrapper>
            </nav>
    );
}


function NavigationWrapper({ children, className }) {
    return (
        <div className={cn("flex items-center gap-x-5 md:gap-x-11 lg:gap-x-9", className)}>
            {children}
        </div>
    );
}
