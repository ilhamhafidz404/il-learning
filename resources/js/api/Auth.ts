import axios from "axios";

export async function login(data) {
    try {
        let result = axios.post("http://127.0.0.1:8000/api/auth/login", data);

        if (result) {
            console.log(result);
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
