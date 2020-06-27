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
        successHandler: () => ({
            type: 'success',
            message: "The request was successful"
        }),
        errorHandler: err => ({
            type: 'error',
            message: err
        })
    }
}
