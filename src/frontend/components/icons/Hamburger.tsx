export default function Hamburger({width = 30, height = 25, className = ""}) {
    return (
        <svg width={width} height={height} viewBox="0 0 30 25" fill="none" className={className}>
            <g id="Hamburgermenu">
                <rect width={width} height={height / 5} fill="currentColor"/>
                <rect y="10" width={width} height={height / 5} fill="currentColor"/>
                <rect y="20" width={width} height={height / 5} fill="currentColor"/>
            </g>
        </svg>
    )

}
