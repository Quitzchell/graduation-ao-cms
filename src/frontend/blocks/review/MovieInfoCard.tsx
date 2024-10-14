import {YouTubeEmbed} from "@next/third-parties/google";

export default function MovieInfoCard({title, director, actors, releaseYear, trailerUrl}) {
    return (
        <>
            <div className="rounded-md p-4 border flex flex-col gap-y-4 mb-8">
                <div className="grid grid-cols-2 ">
                    <div>
                        <p>Movie: {title} </p>
                        {director && <p>Director: {director.fullName}</p>}
                    </div>
                    <div>
                        <p>Release Year: {releaseYear}</p>
                    </div>
                </div>
                <div>
                    {actors && (
                        <p>Lead actors: {actors.map((actor) => actor.fullName).join(', ')}</p>
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
