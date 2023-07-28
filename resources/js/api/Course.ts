import axios from "axios";

export async function getCourses() {
    try {
        let result = await axios.get(`http://127.0.0.1:8000/api/courses`);
        if (result) {
            console.log(result);
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
