export default function Paragraph({title, text}) {
    return (
        <div className="flex flex-col py-2 gap-y-2 md:py-3">
            <h3 data-cypress="paragraph-title" className="font-bold text-lg">{title}</h3>
            <div data-cypress="paragraph-text" dangerouslySetInnerHTML={{__html: text}}/>
        </div>
    )
}
