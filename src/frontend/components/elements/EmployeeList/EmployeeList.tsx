import {EmployeeBlocks, EmployeeData} from "@/components/blocks/Employees";
import Image from "@/components/parts/Image";
import ItemSubtitle, {
    ItemSubtitleColors,
    ItemSubtitleSizes,
} from "@/components/parts/ItemSubtitle";
import ItemTitle, {ListItemTitleColor, ListItemTitleSize} from "@/components/parts/ItemTitle";
import Link, {LinkColors} from "@/components/parts/Link";
import Text, {TextColors} from "@/components/parts/Text";
import {generateHash} from "@/lib/helpers/generator.helper";


export function EmployeeList({items}: { items: EmployeeBlocks }) {
    return (

        <div className="px-6 pb-20 pt-16 lg:px-8 lg:pb-28 lg:pt-24">
            <div className="relative">
                <div className="grid max-w-lg- gap-5 lg:max-w-none md:grid-cols-1 lg:grid-cols-3">
                    {items.map((item) => (
                        <EmployeeCard
                            key={generateHash(item._identifier)}
                            {...item.data}
                        />
                    ))}
                </div>
            </div>
        </div>
    );
}

function EmployeeCard({image, name, jobTitle, description, email}: EmployeeData) {
    return (
        <div
            className="flex flex-col md:flex-row lg:flex-col h-auto md:h-[244px] lg:h-auto overflow-hidden rounded-lg shadow-lg">
            <div className="flex-shrink-0 w-full md:w-1/2 lg:w-full">
                <Image
                    image={image}
                    alt={name}
                    height={205}
                    className="w-full h-52 md:h-full lg:h-52 object-cover"
                />
            </div>
            <div className="flex flex-1 flex-col justify-between bg-teal-300 px-6 pt-6 pb-10">
                <div className="flex-1 min-h-44">
                    <ItemTitle
                        title={name}
                        color={ListItemTitleColor.NEUTRAL}
                        size={ListItemTitleSize.XL}
                    />
                    <div className="pt-1">
                        <ItemSubtitle
                            title={jobTitle}
                            color={ItemSubtitleColors.NEUTRAL}
                            size={ItemSubtitleSizes.SM}
                        />
                    </div>
                    <div className="pt-3">
                        <Text
                            color={TextColors.NEUTRAL}
                            content={description}
                        />
                    </div>
                </div>
                <div className="pt-3">
                    <Link
                        color={LinkColors.NEUTRAL}
                        icon={"mail"}
                        text={email}
                        url={`mailto:${email}`}
                    />
                </div>
            </div>
        </div>
    );
}
