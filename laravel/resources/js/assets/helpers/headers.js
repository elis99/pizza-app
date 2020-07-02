import axios from 'axios'

export default {
    setAuthHeader: () => {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`
    }
}
