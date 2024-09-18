import { EmployeeList } from "@/components/elements/EmployeeList/EmployeeList";

export type EmployeeBlock = {
    _template: string;
    _identifier: string;
    data: EmployeeData;
}
export type EmployeeBlocks = Array<EmployeeBlock>;

export type EmployeeData = {
    image: string;
    name: string;
    jobTitle: string;
    description: string;
    email: string;
};

export default function Employees({ employees } : {employees: EmployeeBlocks }) {
    return <EmployeeList items={employees} />;
}
