export default {
    data(){
        return {
            responseMessageObj: {
                type: "",
                message: ""
            }
        }
    },
    methods: {
        successHandler: (message) => ({
            type: 'success',
            message: message || 'The request was successful'
        }),
        errorHandler: err => ({
            type: 'error',
            message: err
        })
    }
}
