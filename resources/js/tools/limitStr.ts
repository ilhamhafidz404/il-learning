export default function limitStr(
    string: String,
    len: number,
    separator = "..."
) {
    const limitString = (string = string.substring(0, len));
    const resultString = limitString + separator;
    return resultString;
}
