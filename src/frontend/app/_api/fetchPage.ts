export const fetchPage = async (slug: string) => {
    try {
        const res = await fetch(
            `${process.env.NEXT_PUBLIC_BACKEND_URL}/${slug}`,
            {
                next: {
                    revalidate:
                        process.env.NEXT_PRIVATE_DEBUG === "true" ? 0 : 60,
                },
            },
        );
        return res.json();
    } catch (error) {
        console.log(error);
    }

    return null;
};
