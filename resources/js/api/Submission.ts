import axios from "axios";

export async function showSubmission(slug: String) {
    try {
        let result = await axios.get(
            `http://127.0.0.1:8000/api/submissions/${slug}`
        );
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function insertSubmission(data: {
    title: String;
    description: String;
    mission: Number;
    classroom: Number;
    deadlineDate: String;
    deadlineTime: String;
    lecturerId: Number;
}) {
    try {
        let result = await axios.post(
            `http://127.0.0.1:8000/api/submissions/`,
            data
        );
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function updateSubmission(
    slug: String,
    data: {
        title: String;
        description: String;
        mission: Number;
        classroom: Number;
        deadlineDate: String;
        deadlineTime: String;
        lecturerId: Number;
    }
) {
    try {
        let result = await axios.patch(
            `http://127.0.0.1:8000/api/submissions/${slug}`,
            data
        );
        if (result) {
            return result;
        }
    } catch (error) {
        throw error;
    }
}

export async function deleteSubmission(id: Number) {
    try {
        let result = await axios.delete(
            `http://127.0.0.1:8000/api/submissions/${id}`
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
