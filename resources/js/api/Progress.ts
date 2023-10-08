import axios from "axios";

export async function getProgresses() {
    // get data user di local storage
    const authDataString = localStorage.getItem("authData");
    const authData = authDataString ? JSON.parse(authDataString) : null;

    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/progress/${authData.user.id}`
        );
        if (result) {
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
