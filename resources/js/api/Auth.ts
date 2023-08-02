import axios from "axios";

export async function login(data) {
    try {
        let result = axios
        .post("http://127.0.0.1:8000/api/auth/login", data)

        // let result = await axios.get(`http://127.0.0.1:8000/api/courses`);
        if (result) {
            console.log(result);
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
