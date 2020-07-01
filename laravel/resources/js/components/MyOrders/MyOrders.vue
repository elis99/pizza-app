<template>
  <div>
      <div class="basket-page">
        <h3>My Orders</h3>
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
                <span class="secondary-content">19.05.11</i></span>
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
        async getMyOrders() {
            try {
                this.isLoader = true

                const response = await Api.getMyOrders(this.data)
                console.log(response, 'RESP')
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
