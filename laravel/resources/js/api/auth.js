import axios from 'axios'

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
        await axios.post(`${API_ROUTE}/user/login`, data)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {
                console.error(error)
            })
    }
}

