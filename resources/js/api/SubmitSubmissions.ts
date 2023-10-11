import axios from "axios";

export async function showSubmitSubmission(
    missionId: Number,
    submissionId: Number
) {
    const authDataString = localStorage.getItem("authData");
    const authData = authDataString ? JSON.parse(authDataString) : null;

    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/submit-submissions/${authData.user.id}`,
            {
                params: {
                    mission: missionId,
                    submission: submissionId,
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
