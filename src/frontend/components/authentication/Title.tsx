import Link from "next/link";

export default function Title() {
    return (
        <section className='absolute inset-0 h-20 flex justify-center items-center'>
            <Link href={"/home"}>
                <h1 className="text-4xl font-bold text-blue-200">Bonaparte</h1>
            </Link>
        </section>
    );
}
