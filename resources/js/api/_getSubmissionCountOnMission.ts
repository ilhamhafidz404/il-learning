import axios from "axios";

export default async function getSubmissionCountOnMission(missionId) {
    // get data user di local storage
    const authDataString = localStorage.getItem("authData");
    const authData = authDataString ? JSON.parse(authDataString) : null;

    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/submission-count-on-mission/`,
            {
                params: {
                    classroomId: authData.userData.classroom_id,
                    missionId: missionId,
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
