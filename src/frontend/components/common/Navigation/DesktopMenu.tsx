import Link from "next/link";

export default function DesktopMenu({menuItems}) {
    return (
        <>
            {menuItems && menuItems.map(({name, uri}, key) => (
                <Link
                    key={key}
                    href={`/${uri}`}
                    className="text-lg font-bold text-red-300"
                    data-cypress="dynamic-link"
                >
                    {name}
                </Link>
            ))}
        </>
    )
}
