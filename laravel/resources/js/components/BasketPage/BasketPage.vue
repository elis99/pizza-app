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

        <SubmitButton :color="'green'" :buttonEvent="goToPageMakeOrder" :buttonText="'Confirm Order'"/>

    </div>
</template>

<script>
import SubmitButton from '@/components/Buttons/Submit'

export default {
    methods: {
        goToPageMakeOrder() {
           this.$router.push({ path: '/make_order' })
        }
    },
    components: {
        SubmitButton
    }
}
</script>

<style>
    @import url('./style.css');
</style>
