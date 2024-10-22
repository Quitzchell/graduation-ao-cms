import { GoogleMapsEmbed } from '@next/third-parties/google'
export default function Map({title, text, location}) {
    return (
            <section className="container" data-cypress="map-block">
                <div className="py-10 flex flex-col gap-y-6 text-neutral-900">
                    <div className="flex flex-col gap-y-4">
                        <h3 className="text-2xl font-bold">{title}</h3>
                        <div dangerouslySetInnerHTML={{__html: text}}/>
                    </div>

                    <GoogleMapsEmbed
                        apiKey="AIzaSyCQyWVaniZIIE3DyJAb6p2I5moEGL6LflM"
                        height={500}
                        width="100%"
                        mode="place"
                        q={location}
                    />
                </div>
            </section>
    )
}
