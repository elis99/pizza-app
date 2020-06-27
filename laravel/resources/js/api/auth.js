import axios from 'axios'

const API_ROUTE = 'api/v1'

export default {
    register: async (data) => {
        await axios.post(`${API_ROUTE}/user`, data)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
    },
    login: async (data) => {
        await axios.post(`${API_ROUTE}/login`, data)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
    }
}

