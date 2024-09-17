export const fetchPage = async (slug: string) => {
    try {
        const res = await fetch(`${process.env.NEXT_PUBLIC_BACKEND_URL}/${slug}`, {
            credentials: "include",
            headers: {
                "Content-Type": "application/json",
            },
            next: {
                revalidate: process.env.NEXT_PRIVATE_DEBUG === "true" ? 0 : 60,
            },
        });
        return res.json();
    } catch (error) {
        console.log(error);
    }

    return null;
};
