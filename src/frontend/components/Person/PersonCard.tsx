import Image from "next/image";

import defaultPersonImage from "@/public/images/default-person-image.png";

export default function PersonCard({person}) {
    const yearOfBirth = new Date(person.birth.date).getFullYear()
    const yearOfDeath = new Date(person.death.date).getFullYear()


    return (
        <div className="h-fit w-68 p-4 bg-neutral-50 rounded-lg">
            <div className="h-60 w-auto overflow-clip rounded-md">
                {person.image ? (<Image
                    src={person.image ?? defaultPersonImage}
                    alt={person.name}
                    width={1280}
                    height={320}
                    className="object-cover"
                />) : (<Image src={defaultPersonImage} alt={'Image placeholder'} width={240} height={240} className={"bg-yellow-50"}/>)}
            </div>

            <div className="flex flex-col gap-y-1 pt-2">
                <p className="font-bold text-lg mb-2">{person.fullName}</p>
                <div className="border"/>
                <div className="flex justify-between">
                    <p className="font-bold">{yearOfBirth}</p>
                    <p className="font-bold">{'\u271D'} {yearOfDeath}</p>
                </div>
            </div>

        </div>
    );
}
