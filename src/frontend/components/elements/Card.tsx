import Image from "@/components/parts/Image";
import ItemSubtitle, {ItemSubtitleColors, ItemSubtitleSizes} from "@/components/parts/ItemSubtitle";
import ItemTitle, {ListItemTitleColor, ListItemTitleSize} from "@/components/parts/ItemTitle";
import Link, {LinkColors} from "@/components/parts/Link";
import Text, {TextColors} from "@/components/parts/Text";


export function Card() {

    const src = '/man.png';

    return <>
        <div className="flex flex-col md:flex-row lg:flex-col rounded-1">
            <div className=" w-full md:w-1/2 lg:w-full">
                <Image image={src} alt={'Man'} height={100}/>
            </div>
            <div className="bg-teal-300 px-6 pt-5 pb-10  w-full md:w-1/2 lg:w-full rounded-bottom rounded-1 ">
                <ItemTitle title={'René Halberstadt'} color={ListItemTitleColor.DARK} size={ListItemTitleSize.XL}/>
                <ItemSubtitle title={'Projectleider'} color={ItemSubtitleColors.NEUTRAL} size={ItemSubtitleSizes.SM}/>
                <div className="pt-3">
                    <Text color={TextColors.DARK}
                          content={'Samenwerking en ontwikkeling, aanwezigheid, geoorloofd en ongeoorloofd verzuim.'}/>
                </div>
                <div className="pt-3">
                    <Link color={LinkColors.NEUTRAL}
                          icon={'mail'}
                          text={'r.halberstadt@ingrado.nl'}
                          url={'mailto:r.halberstadt@ingrant.nl'}
                    />
                </div>
            </div>
        </div>
    </>;
}
