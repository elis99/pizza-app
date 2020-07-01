import axios from 'axios'

const API_ROUTE = 'api/v1'

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`

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
    },
    getTotalPrices: async (data) => {
        return await axios.post(`${API_ROUTE}/order/calc`, data)
            .then((response) => {
                return response
            })
            .catch((error) => {
                return error
            })
    }
}

