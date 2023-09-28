import axios from "axios";

export default async function acceptCredits(courses: Array<Number>) {
    // get data user di local storage
    const authDataString = localStorage.getItem("authData");
    const authData = authDataString ? JSON.parse(authDataString) : null;

    try {
        let result = await axios.post(
            `http://127.0.0.1:8000/api/accept-credits/`,
            {
                userId: authData.user.id,
                courses: courses,
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
