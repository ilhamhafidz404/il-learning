import axios from "axios";

export async function getCourses(getAllData = false) {
    // get data user di local storage
    const authDataString = localStorage.getItem("authData");
    const authData = authDataString ? JSON.parse(authDataString) : null;

    try {
        let result = await axios.get(`http://127.0.0.1:8000/api/courses`, {
            params: {
                userId: authData.user.id,
                getAllData: getAllData,
            },
        });
        if (result) {
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}

export async function showCourses(slug: String) {
    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/courses/${slug}`,
            {
                params: {
                    token: "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2OTEwMDE5MjcsImV4cCI6MTY5NzAwMTg2NywibmJmIjoxNjkxMDAxOTI3LCJqdGkiOiJpZnpmdjUwY1NjYm5FMmhQIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.z5Bbl6IHr1hmFrIse1Qas3QiY5DyrF2zVhZ8ZNvuKoI",
                },
            }
        );
        if (result) {
            console.log(result);
            return result;
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
}
