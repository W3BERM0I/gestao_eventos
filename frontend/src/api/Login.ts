import apiClient from "./index";

export default {
    sendToken: (email: string) => {
        return apiClient.post("login/send", {
            email: email
        });
    },
    resendToken: (email: string) => {
        return apiClient.post("login/send", {
            email: email
        });
    },
    validateToken: (email: string, token: string) => {
        return apiClient.post("login/validate", {
            email: email,
            token: token
        });
    }
};