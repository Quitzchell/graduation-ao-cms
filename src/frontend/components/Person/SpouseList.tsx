import {fetchPerson} from "@/lib/fetchUtils";

export default async function SpouseList({spouseUuids}) {
    const spouses = await Promise.all(spouseUuids.map(async (uuid: string) => {
        return await fetchPerson(uuid);
    }));

    return (
        <>
            {spouses.length > 0 && (
                <ul>
                    <li className={"font-bold"}>Spouses:</li>
                    {spouses.length > 0 && (
                        spouses.map((spouse) => (
                            <li key={spouse.uuid} className={"ml-8 list-disc"}>
                                {spouse.fullName}
                            </li>
                        ))
                    )}
                </ul>
            )}
        </>
    )
}
