import axios, { AxiosInstance } from "axios";

const apiClient: AxiosInstance = axios.create({
    baseURL: "http://localhost:3080/api",
    headers: {
        "Content-type": "application/json",
    },
});

export default apiClient;