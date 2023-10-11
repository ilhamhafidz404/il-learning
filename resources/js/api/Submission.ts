import axios from "axios";

export async function deleteSubmission(id: Number) {
    try {
        let result = await axios.delete(
            `http://127.0.0.1:8000/api/submissions/${id}`
        );
        if (result) {
            console.log(result);
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
