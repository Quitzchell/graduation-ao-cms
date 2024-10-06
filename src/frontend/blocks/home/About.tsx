export default function About(aboutItems) {
    const {title, text} = aboutItems
    return (
        <section className={"container"}>
            <div className={"flex flex-col py-8 gap-y-6"}>
                <h3 className={"text-2xl font-bold"}>{title}</h3>
                <div className="flex flex-col gap-y-4" dangerouslySetInnerHTML={{__html: text}}/>
            </div>
        </section>
    )
}
