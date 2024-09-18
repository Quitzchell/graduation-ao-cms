import Blocks from "@/components/Blocks";
import { fetchPage } from "@/lib/fetchPage";
import Title, { Colors } from "@/parts/Title";

export default async function Page({ params }: { params: { segments: string[] } }) {
    const page = await fetchPage(params.segments.join("/"));

    return (
        <div>
            <h1>Page</h1>
            <div>{JSON.stringify(page)}</div>
            {page?.blocks !== null && <Blocks blocks={page.blocks} />}

            <Title
                title={"Dit is een titel"}
                color={Colors.DARKGREEN}
                size={"5xl"}
            />
        </div>
    );
}
