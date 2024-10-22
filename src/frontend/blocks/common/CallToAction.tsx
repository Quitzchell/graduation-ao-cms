import Link from "next/link";

import {Button} from "@/components/ui/button";

export default function CallToAction({title, text, buttonUrl, buttonText}) {
    return (
        <section className="bg-teal-75" data-cypress="call-to-action-block">
            <div className="container">
                <div className="py-10 flex flex-col gap-y-6 text-neutral-900">
                    <div className="flex flex-col gap-y-4">
                        <h3 className="text-2xl font-bold">{title}</h3>
                        <div dangerouslySetInnerHTML={{__html: text}}/>
                    </div>

                    <div className="flex justify-end">
                        <Button asChild variant="outline">
                            <Link href={buttonUrl}>{buttonText}</Link>
                        </Button>
                    </div>
                </div>
            </div>
        </section>
    );
}
