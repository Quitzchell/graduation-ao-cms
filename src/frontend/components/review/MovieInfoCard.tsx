import {YouTubeEmbed} from "@next/third-parties/google";

export default function MovieInfoCard({title, director, actors, releaseYear, trailerUrl}) {
    return (
        <>
            <div className="rounded-md p-4 border flex flex-col gap-y-4 mb-8">
                <div className="grid xs:grid-col-1 sm:grid-cols-2 ">
                    <div>
                        <p>
                            <span className="font-bold">Movie: </span>
                            {title}
                        </p>
                        {director && <p>
                            <span className="font-bold">Director: </span>
                            {director.fullName}
                        </p>}
                    </div>
                    <div>
                        <p>
                            <span className="font-bold">Release Year: </span>
                            {releaseYear}
                        </p>
                    </div>
                </div>
                <div>
                    {actors && (
                        <p>
                            <span className="font-bold">Lead actors: </span>
                            {actors.map((actor) => actor.fullName).join(', ')}
                        </p>
                    )}
                </div>
            </div>

            {trailerUrl &&
                <div className="w-auto h-auto my-6">
                    <YouTubeEmbed
                        videoid={trailerUrl.match(/embed\/([a-zA-Z0-9_-]{11})/)[1]}
                        params="controls=0"
                        style="margin: 0 auto"
                    />
                </div>
            }
        </>
    )
}
