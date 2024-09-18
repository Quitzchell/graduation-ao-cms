import { EmployeeList } from "@/components/elements/EmployeeList/EmployeeList";

export default function Employees({ employees }) {
    return <EmployeeList items={employees} />;
}
