<template>
  <div>
      <div class="basket-page">
        <h3>My Orders</h3>
        <p>(last 5)</p>
        <ul v-for="order in myOrders" :key="`my-order-${order.id}`" class="collection">
            <li class="collection-item avatar">
            <i class="material-icons circle red">local_pizza</i>
            <span
                v-for="(pizza, i) in order.pizzas"
                :key="pizza.id"
                class="title"
            >
            {{pizza.name}}<span v-if="checkIsSymble(i, order.pizzas)">, </span>
            </span>
            <div class="color-green">
                 <span v-for="(price, i) in order.total_prices" :key="`total-price-${price.name}`">
                     {{price.total_price}} {{price.name}}<span v-if="checkIsSymble(i, order.total_prices)"> / </span>
                </span>
            </div>
                <span class="secondary-content">{{order.created_at}}</span>
            </li>
        </ul>
  </div>
  </div>
</template>

<script>
import Api from '@/api/index'
import ResponseCard from '@/components/Common/ResponseCard'
import ResponseMessageHandler from '@/assets/mixins/ResponseMessageHandler'

export default {
    mixins: [ResponseMessageHandler],
    data() {
        return {
            myOrders: null
        }
    },
    created() {
        this.getMyOrders();
    },
    methods: {
        checkIsSymble(i, array){
            return i+1 < array.length
        },
        async getMyOrders() {
            try {
                this.isLoader = true

                const response = await Api.getMyOrders(this.data)
                if (response && response.status === 200) {
                    this.myOrders = response.data
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
        ResponseCard
    }
}
</script>

<style>

</style>
