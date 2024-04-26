import axios from "axios";
import router from "./router.js";

const adminApi = axios.create()

// Request
adminApi.interceptors.request.use(config => {
    const token = localStorage.getItem('access_token')
    if (token) {
        config.headers = {
            'authorization': `Bearer ${token}`
        }
    }

    return config
}, () => {

})

//Response
adminApi.interceptors.response.use(() => {}, error => {
    console.log(error)
    if (error.response.status === 401) {
        router.push({name: 'login'})
    }

})

export default adminApi
