export default function Paragraph({title, text}) {
    return (
        <div className="flex flex-col py-2 gap-y-2 md:py-3">
            <h3 className="font-bold text-lg">{title}</h3>
            <div dangerouslySetInnerHTML={{__html: text}}/>
        </div>
    )
}
