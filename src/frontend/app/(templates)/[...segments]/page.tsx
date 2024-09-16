import { fetchPage } from "@/app/_api/fetchPage";
import Blocks from "@/components/Blocks";

export default async function Page({
    params,
}: {
    params: { segments: string[] };
}) {
    const page = await fetchPage(params.segments.join("/"));

    return (
        <div>
            <h1>Page</h1>
            <div>{JSON.stringify(page)}</div>
            <Blocks blocks={page.blocks} />
        </div>
    );
}
