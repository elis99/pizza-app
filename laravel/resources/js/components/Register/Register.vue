<template>
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input v-model="data.first_name" id="first_name" type="text" class="validate" required>
                    <label for="first_name">First Name*</label>
                </div>
                <div class="input-field col s6">
                    <input  v-model="data.last_name" id="last_name" type="text" class="validate" required>
                    <label for="last_name">Last Name*</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input v-model="data.email" id="email" type="email" class="validate" required>
                <label for="email">Email*</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input v-model="data.password" id="password" type="password" class="validate" required>
                <label for="password">Password*</label>
                </div>
            </div>
            <SubmitButton :buttonEvent="register" :buttonText="'Register'"/>
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
            }
        }
    },
    methods: {
        async register() {
            try {
                const response = await ApiAuth.register(this.data)
                this.responseMessageObj = this.successHandler()
                                console.log('COORRe')

            } catch (e) {
                console.log('eeee', e)
                this.responseMessageObj = this.errorHandler()
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
