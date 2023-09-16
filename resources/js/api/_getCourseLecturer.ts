import axios from "axios";

export default async function getCourseLecturer(lecturerId) {
    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/course-leturer/${lecturerId}`
        );
        if (result) {
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
