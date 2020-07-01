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
            <SubmitButton :isLoader="isLoader" :buttonEvent="login" :buttonText="'Login'"/>
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
            },
            isLoader: false
        }
    },
    methods: {
        async login() {
            try {
                this.isLoader = true

                const response = await ApiAuth.login(this.data)
                if (response && response.status === 201) {
                    this.setAuthUser(response.data)
                } else {
                   this.checkError(response)
                }
                this.isLoader = false
            } catch (e) {
                this.isLoader = false
                this.responseMessageObj = this.errorHandler(e)
            }
        },
        setAuthUser(data) {
            this.$store.commit('setAuthUser', data)
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
