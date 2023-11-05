import axios from "axios";

export async function getFaculties() {
    try {
        let result = await axios.get(`http://127.0.0.1:8000/api/faculties`);
        if (result) {
            return result;
        }
    } catch (error) {
        throw(error)
    }
}