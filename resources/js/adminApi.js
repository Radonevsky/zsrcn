import axios from "axios";
import router from "./router.js";

const adminApi = axios.create()

// Request
adminApi.interceptors.request.use(config => {
    const token = localStorage.getItem('access_token')
    if (token) {
        config.headers.authorization = `Bearer ${token}`
    }

    return config
}, error => {

})

//Response
adminApi.interceptors.response.use(() => {}, error => {
    if (error.response.data.message === 'Token has expired') {
        return axios.post('api/auth/refresh', {}, {
            headers: {
                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
        }).then(res => {
            localStorage.setItem('access_token', res.data.access_token)
            error.config.headers.authorization = `Bearer ${res.data.access_token}`

            return adminApi.request(error.config)
        })
    }
})

export default adminApi
