import PropTypes from "prop-types";

import Icon, { IconColors } from "@/components/parts/Icon";

function CommonDate({ date }) {
    const dateFormatted = date.toLocaleString("nl-NL", {
        day: "numeric",
        month: "short",
        year: "numeric",
    });

    return (
        <div className="flex items-start gap-x-2">
            <Icon
                color={IconColors.BLUE}
                name="calendar"
                width={20}
                height={20}
            />
            <div className={"text-blue-75"}>{dateFormatted}</div>
        </div>
    );
}

CommonDate.propTypes = {
    date: PropTypes.instanceOf(Date).isRequired,
};

export default CommonDate;
