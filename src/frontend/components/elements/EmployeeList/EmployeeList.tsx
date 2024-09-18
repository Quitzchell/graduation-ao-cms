import {EmployeeBlocks, EmployeeData} from "@/components/blocks/Employees";
import Image from "@/components/parts/Image";
import ItemSubtitle, {
    ItemSubtitleColors,
    ItemSubtitleSizes,
} from "@/components/parts/ItemSubtitle";
import ItemTitle, { ListItemTitleColor, ListItemTitleSize } from "@/components/parts/ItemTitle";
import Link, { LinkColors } from "@/components/parts/Link";
import Text, { TextColors } from "@/components/parts/Text";
import {generateHash} from "@/lib/helpers/generator.helper";


export function EmployeeList({ items }: { items: EmployeeBlocks }) {
    return (
        <div className="flex flex-col gap-5 lg:flex-row">
            {items.map((item) => (
                <EmployeeCard
                    key={generateHash(item._identifier)}
                    {...item.data}
                />
            ))}
        </div>
    );
}

function EmployeeCard({ image, name, jobTitle, description, email }: EmployeeData) {
    return (
        <div className="rounded-1 flex flex-col md:flex-row lg:flex-col">
            <div className="w-full md:w-1/2 lg:w-full">
                <Image
                    image={image}
                    alt={"Man"}
                    height={100}
                />
            </div>
            <div className="rounded-bottom rounded-1 w-full bg-teal-300 px-6 pb-10 pt-5 md:w-1/2 lg:w-full">
                <ItemTitle
                    title={name}
                    color={ListItemTitleColor.DARK}
                    size={ListItemTitleSize.XL}
                />
                <ItemSubtitle
                    title={jobTitle}
                    color={ItemSubtitleColors.NEUTRAL}
                    size={ItemSubtitleSizes.SM}
                />
                <div className="pt-3">
                    <Text
                        color={TextColors.DARK}
                        content={description}
                    />
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
