import axios from "axios";

export default async function submitSubmission(data) {
    try {
        let result = await axios.post(
            `http://127.0.0.1:8000/api/submit-submission/`,
            data,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            }
        );
        if (result) {
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
