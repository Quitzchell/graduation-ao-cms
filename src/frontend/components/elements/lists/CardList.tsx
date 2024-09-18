export function CardList({ children }: { children: React.ReactNode }) {
    return <div className="flex flex-col lg:flex-row gap-5">
        {children}
    </div>;
}
