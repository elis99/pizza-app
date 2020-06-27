<template>
    <div class="row">
        <h3>Login</h3>
        <form class="col s12">
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
            <SubmitButton :buttonEvent="login" :buttonText="'Login'"/>
            <div class="not-registered">Not registered? <a href="/register">Register!</a></div>
            <div v-if="this.responseMessageObj.message">
               <ResponseCard :messageObj="responseMessageObj"/>
            </div>
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
                email: '',
                password: ''
            }
        }
    },
    methods: {
        async login() {
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
