import PropTypes from "prop-types";

import Icon, { IconColors } from "@/components/parts/Icon";
import { cn } from "@/lib/utils";

export enum CommonDateColors {
    BLUE = "blue",
}

const colorMap = {
    [CommonDateColors.BLUE]: { text: "text-blue-75", icon: IconColors.BLUE },
};
function DateLabel({ date, color }) {
    const { text, iconColor } = colorMap[color] || {};
    const dateClass = cn(text);
    const dateFormatted = date.toLocaleString("nl-NL", {
        day: "numeric",
        month: "short",
        year: "numeric",
    });

    return (
        <div className="flex items-start gap-x-2">
            <Icon
                color={iconColor}
                name="calendar"
                width={20}
                height={20}
            />
            <div className={dateClass}>{dateFormatted}</div>
        </div>
    );
}

DateLabel.propTypes = {
    date: PropTypes.instanceOf(Date).isRequired,
    color: PropTypes.oneOf(Object.values(CommonDateColors)),
};

DateLabel.defaultProps = {
    date: new Date(),
    color: CommonDateColors.BLUE,
};

export default DateLabel;
