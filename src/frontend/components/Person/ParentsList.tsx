import {fetchPerson} from "@/lib/fetchUtils";

export default async function ParentsList({parentUuids}) {
    const parents = await Promise.all(parentUuids.map(async (uuid: string) => {
        return await fetchPerson(uuid);
    }));

    const getParentLabel = (gender: string) => {
        const genderLabel = {
            M: 'Father',
            F: 'Mother',
            X: 'Parent'
        };

        return genderLabel[gender] || 'Parent'; // Default to 'Parent'
    };

    return (
        <div className={"h-25"}>
            {parents.length > 0 ? (
                parents.map((parent) => (
                    <ul key={parent.uuid}>
                        <li className={"font-bold"}>
                            {getParentLabel(parent.gender)}:
                        </li>
                        <li className={"ml-8 list-disc"}>{parent.fullName}</li>

                        {parents.length === 1 && (
                            parent.gender === 'X' ? (
                                <>
                                    <li className={"font-bold"}>
                                        {getParentLabel(parent.gender)}:
                                    </li>
                                    <li className={"ml-8 list-disc"}>Unknown</li>
                                </>
                            ) : (
                                <>
                                    <li className={"font-bold"}>
                                        {getParentLabel(parent.gender === "M" ? "F" : "M")}:
                                    </li>
                                    <li className={"ml-8 list-disc"}>Unknown</li>
                                </>
                            )
                        )}
                    </ul>
                ))
            ) : (
                <ul>
                    <li className="font-bold">Father:</li>
                    <li className={"ml-8 list-disc"}>Unknown</li>
                    <li className="font-bold">Mother:</li>
                    <li className={"ml-8 list-disc"}>Unknown</li>
                </ul>
            )}
        </div>
    );
}
