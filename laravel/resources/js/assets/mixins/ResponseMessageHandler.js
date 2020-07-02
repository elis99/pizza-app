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
        checkError(response) {
            let message = null

            if (response.response.status === 422) {
                const errors = response.response.data.errors
                let errorsArray = []
                for (const [key, value] of Object.entries(errors)) {
                    errorsArray.push(value[0]);
                }
                message = errorsArray.join(' ')
            }

            this.responseMessageObj = this.errorHandler(message)
        },
        successHandler: (message) => ({
            type: 'success',
            message: message || 'The request was successful'
        }),
        errorHandler: err => ({
            type: 'error',
            message: err || "Something went wrong, please try again"
        })
    }
}
