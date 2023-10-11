import * as dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime"; // Import plugin relativeTime

dayjs.extend(relativeTime); // Extend dayjs with the plugin

export default function diffForHumans(value = "") {
    const formattedDate = dayjs(value).fromNow();
    return formattedDate;
}
