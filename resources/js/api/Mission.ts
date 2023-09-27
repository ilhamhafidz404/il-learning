import axios from "axios";

export async function getMission() {
    try {
        let result = await axios.get(`http://127.0.0.1:8000/api/missions/`);
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function showMission(slug: String) {
    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/missions/${slug}`,
            {
                params: {
                    token: "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2OTEwMDE5MjcsImV4cCI6MTY5NzAwMTg2NywibmJmIjoxNjkxMDAxOTI3LCJqdGkiOiJpZnpmdjUwY1NjYm5FMmhQIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.z5Bbl6IHr1hmFrIse1Qas3QiY5DyrF2zVhZ8ZNvuKoI",
                },
            }
        );
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function insertMission(data: { name: string; courseId: number }) {
    try {
        let result = await axios.post(`http://127.0.0.1:8000/api/missions/`, {
            name: data.name,
            courseId: data.courseId,
        });
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function updateMission(data: { slug: String; name: String }) {
    try {
        let result = await axios.patch(
            `http://127.0.0.1:8000/api/missions/${data.slug}`,
            {
                name: data.name,
            }
        );
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function deleteMission(missionId: number) {
    try {
        let result = await axios.delete(
            `http://127.0.0.1:8000/api/missions/${missionId}`
        );
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}
