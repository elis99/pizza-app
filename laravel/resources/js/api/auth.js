import axios from 'axios'
import headers from '@/assets/helpers/headers'

const API_ROUTE = 'api/v1'

export default {
    register: async data => {
        return await axios.post(`${API_ROUTE}/user`, data)
            .then((response) => {
                return response
            })
            .catch((error) => {
                return error
            })
    },
    login: async data => {
        return await axios.post(`${API_ROUTE}/user/login`, data)
            .then((response) => {
                return response
            })
            .catch((error) => {
                return error
            })
    },
    logout: async () => {
        console.log(1111)
        headers.setAuthHeader()
        console.log(2222)

        return await axios.delete(`${API_ROUTE}/user/logout`)
            .then((response) => {
                return response
            })
            .catch((error) => {
                return error
            })
    }
}

