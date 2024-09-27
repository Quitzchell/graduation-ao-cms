export default function FamilyTree({people}) {
    return (
        <div className={"flex flex-col gap-y-10"}>
            {people.map((person, index) => (
                <div key={index}>
                    <h3 className={"text-xl"}>{person.name} {person.surname}</h3>

                    <div className={"flex gap-x-6"}>

                        {person.parents.length > 0 && (
                            <div>
                                <h4 className={"underline"}>Parents:</h4>
                                {person.parents.map((parent, parentIndex) => (
                                    <div key={parentIndex}>{parent.name} {parent.surname}</div>
                                ))}
                            </div>
                        )}

                        {person.children.length > 0 && (
                            <div>
                                <h4 className={"underline"}>Children:</h4>
                                {person.children.map((child, childIndex) => (
                                    <div key={childIndex}>{child.name} {child.surname}</div>
                                ))}
                            </div>
                        )}
                    </div>
                </div>
            ))}
            <pre>{JSON.stringify(people, null, 2)}</pre>

        </div>
    )
}
