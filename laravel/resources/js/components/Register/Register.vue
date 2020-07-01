<template>
    <div class="row">
        <h3>Register</h3>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input v-model="data.first_name" id="first_name" type="text" class="validate" required/>
                    <label for="first_name">First Name*</label>
                </div>
                <div class="input-field col s6">
                    <input  v-model="data.last_name" id="last_name" type="text" class="validate" required/>
                    <label for="last_name">Last Name*</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input v-model="data.email" id="email" type="email" class="validate" required/>
                <label for="email">Email*</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input v-model="data.password" id="password" min="6" type="password" class="validate" required>
                <label for="password">Password*</label>
                </div>
            </div>
            <SubmitButton :isLoader="isLoader" :buttonEvent="register" :buttonText="'Register'"/>
            <div v-if="this.responseMessageObj.message">
               <ResponseCard :messageObj="responseMessageObj"/>
            </div>
            <div class="registered">Already registered? <a href="/login">Login!</a></div>
        </form>
    </div>
</template>

<script>
import ResponseMessageHandler from '@/assets/mixins/ResponseMessageHandler'
import SubmitButton from '@/components/Buttons/Submit'
import ResponseCard from '@/components/Common/ResponseCard'
import ApiAuth from '@/api/auth'

export default {
    mixins: [ResponseMessageHandler],
    data() {
        return {
            data: {
                first_name: '',
                last_name: '',
                email: '',
                password: ''
            },
            isLoader: false
        }
    },
    methods: {
        async register() {
            try {
                this.isLoader = true

                const response = await ApiAuth.register(this.data)
                if (response && response.status === 201) {
                    this.responseMessageObj = this.successHandler("Registration almost complete, please check your Email")
                } else {
                   this.checkErrorForValidation(response)
                }
                this.isLoader = false
            } catch (e) {
                this.isLoader = false
                this.responseMessageObj = this.errorHandler(e)
            }
        }
    },
    components: {
        SubmitButton,
        ResponseCard
    }
}
</script>

<style>
    @import url('./style.css');
</style>
