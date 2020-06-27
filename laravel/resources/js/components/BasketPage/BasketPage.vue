<template>
    <div class="basket-page">
        <h3>Basket</h3>
        <ul class="collection">
            <li class="collection-item avatar">
            <i class="material-icons circle red">local_pizza</i>
            <span class="title">Pizza name</span>
            <span>x <b>10</b></span>
            <div class="color-green">
                 <span>
                    100 euro
                </span> /
                <span>
                    100 dollars
                </span>
            </div>
            </li>
        </ul>
        <h4><b>Total price:</b></h4>
        <div>
            <h5>
                 100 euro / 100 dollars
            </h5>
            (including delivery)
        </div>
        <div  class="margin-top-30">
             <SubmitButton
                :color="'green'"
                :buttonEvent="goToPageMakeOrder"
                :buttonText="'Confirm Order'"
            />
            <SubmitButton :color="'red'" :buttonEvent="clearBasket" :buttonText="'Clear Basket'"/>
        </div>
        <div v-if="this.responseMessageObj.message">
               <ResponseCard :messageObj="responseMessageObj"/>
        </div>
    </div>
</template>

<script>
import SubmitButton from '@/components/Buttons/Submit'
import ResponseMessageHandler from '@/assets/mixins/ResponseMessageHandler'
import ResponseCard from '@/components/Common/ResponseCard'

export default {
    mixins: [ResponseMessageHandler],
    methods: {
        goToPageMakeOrder() {
           this.$router.push({ path: '/make_order' })
        },
        clearBasket() {
            window.sessionStorage.clear()
            this.$store.commit('clearBasket')
            this.responseMessageObj = this.successHandler('Basket was cleared!')
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
