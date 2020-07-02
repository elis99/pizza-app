<template>
    <div>
    <h3>Make order</h3>
    <div class="row">
        <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
            <input :value="userData.first_name" id="first_name" type="text" class="validate" disabled>
            </div>
            <div class="input-field col s6">
            <input :value="userData.last_name"  id="last_name" type="text" class="validate" disabled>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input v-model="data.address" id="email" type="text" class="validate">
            <label for="email">Address</label>
            </div>
        </div>
        <SubmitButton  :isLoader="isLoader" :color="'green'" :buttonEvent="makeOrder" :buttonText="'Make Order'"/>
        </form>
         <div v-if="responseMessageObj.message">
               <ResponseCard :messageObj="responseMessageObj"/>
        </div>
    </div>
    </div>
</template>

<script>
import ResponseMessageHandler from '@/assets/mixins/ResponseMessageHandler'
import SubmitButton from '@/components/Buttons/Submit'
import ResponseCard from '@/components/Common/ResponseCard'
import Api from '@/api/index'

export default {
    mixins: [ResponseMessageHandler],
    data() {
        return {
            data: {
                address: null,
                pizzas: null
            },
            userData: null,
            isLoader: false
        }
    },
    created() {
        this.getUserFromStore()
        this.getPizzasFromStore()
    },
    methods: {
        getPizzasFromStore() {
            this.data.pizzas = this.$store.state.basket
        },
        getUserFromStore() {
            this.userData = this.$store.state.user
        },
        async makeOrder() {
            try {
                this.isLoader = true

                const response = await Api.makeOrder(this.data)
                if (response && response.status === 201) {
                    this.responseMessageObj = this.successHandler("Thank you, We've recieved your order!")
                    window.sessionStorage.clear()
                    this.$store.commit('clearBasket')
                } else {
                   this.checkError(response)
                }
                this.isLoader = false
            } catch (e) {
                this.isLoader = false
                this.responseMessageObj = this.errorHandler(e)
            }
        },
    },
    components: {
        SubmitButton,
        ResponseCard
    }
}
</script>

<style>

</style>
