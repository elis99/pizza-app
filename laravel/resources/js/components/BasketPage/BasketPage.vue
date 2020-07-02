<template>
    <div class="max-screen-height">
        <div v-if="!isUserAuth">
            <h4>Please login to use basket</h4>
        </div>
        <h3 v-else>Basket</h3>
        <div  v-if="isUserAuth && basketPizzas && basketPizzas.length > 0" class="basket-page">
            <ul
                v-for="data in basketPizzas"
                :key="`basket-pizza-${data.pizza.id}`"
                class="collection"
            >
                <li class="collection-item avatar">
                <i class="material-icons circle red">local_pizza</i>
                <span class="title">{{data.pizza.name}}</span>
                <span>x <b>{{data.amount}}</b></span>
                <div class="color-green">
                    <span>
                        {{data.pizza.price_eur * data.amount}} euro
                    </span> /
                    <span>
                        {{data.pizza.price_usd * data.amount}} dollars
                    </span>
                </div>
                </li>
            </ul>
            <div>
                <h4><b>Total price:</b></h4>
                <div v-if="totalPrices">
                    <h5>
                        {{totalPrices.total_eur}}  euro / {{totalPrices.total_usd}} dollars
                    </h5>
                    (including delivery)
                </div>
                <Loader v-else />
                <div  class="margin-top-30">
                    <SubmitButton
                        :color="'green'"
                        :buttonEvent="goToPageMakeOrder"
                        :buttonText="'Confirm Order'"
                    />
                    <SubmitButton :color="'red'" :buttonEvent="clearBasket" :buttonText="'Clear Basket'"/>
                </div>
            </div>
            <div v-if="this.responseMessageObj.message">
                <ResponseCard :messageObj="responseMessageObj"/>
            </div>
        </div>
        <div v-else-if="isUserAuth">Basket is empty:(</div>
    </div>
</template>

<script>
import SubmitButton from '@/components/Buttons/Submit'
import ResponseMessageHandler from '@/assets/mixins/ResponseMessageHandler'
import ResponseCard from '@/components/Common/ResponseCard'
import Api from '@/api/index'
import Loader from '@/components/Loader/Loader'

export default {
    mixins: [ResponseMessageHandler],
    data() {
        return {
            totalPrices: null,
            basketPizzas: null,
            isUserAuth: false
        }
    },
    created() {
        this.basketPizzas = this.getPizzasFromStore()
        this.getTotalPrices(this.basketPizzas)
        this.checkUserStatus()
    },
    methods: {
        checkUserStatus() {
            if (localStorage.getItem('access_token')) {
                this.isUserAuth = true
            }
        },
        async getTotalPrices(basketPizzas) {
            this.totalPrices = (await Api.getTotalPrices(basketPizzas)).data
        },
        getPizzasFromStore() {
            return this.$store.state.basket
        },
        goToPageMakeOrder() {
           this.$router.push({ path: '/make_order' })
        },
        clearBasket() {
            window.sessionStorage.clear()
            this.$store.commit('clearBasket')
            this.basketPizzas = null
            this.responseMessageObj = this.successHandler('Basket was cleared!')
        }
    },
    components: {
        SubmitButton,
        ResponseCard,
        Loader
    }
}
</script>

<style>
    @import url('./style.css');
</style>
