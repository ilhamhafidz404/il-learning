import axios from "axios";

export default async function getStudentCompleteSubmission(submissionSlug) {
    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/students-submission-complete/${submissionSlug}`
        );
        if (result) {
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
