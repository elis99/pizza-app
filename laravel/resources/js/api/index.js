import axios from 'axios'

const API_ROUTE = 'api/v1'

export default {
    getPizzas: async () => {
       return await axios.get(`${API_ROUTE}/pizza/all`)
            .then((response) => {
                return response
            })
            .catch((error) => {
                return error
            })
    },
    getMyOrders: async () => {
        return await axios.get(`${API_ROUTE}/order`)
            .then((response) => {
                return response
            })
            .catch((error) => {
                return error
            })
    }
}

