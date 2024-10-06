export default function Paragraph({text}) {
    return (
        <div>
         <div dangerouslySetInnerHTML={{__html: text}}/>
        </div>


    )
}
