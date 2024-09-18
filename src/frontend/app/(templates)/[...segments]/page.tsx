import Blocks from "@/components/Blocks";
import { fetchPage } from "@/lib/fetchPage";

export default async function Page({ params }: { params: { segments: string[] } }) {
    const page = await fetchPage(params.segments.join("/"));

    return (
        <div>
            <h1>Page</h1>
            <div>{JSON.stringify(page)}</div>
            {page?.blocks !== null && <Blocks blocks={page.blocks} />}]
        </div>
    );
}
