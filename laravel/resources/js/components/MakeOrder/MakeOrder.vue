<template>
    <div>
    <h3>Make order</h3>
    <div class="row">
        <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
            <input id="first_name" type="text" class="validate">
            <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">Last Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="email" type="text" class="validate">
            <label for="email">Address</label>
            </div>
        </div>
        <SubmitButton :color="'green'" :buttonEvent="makeOrder" :buttonText="'Make Order'"/>
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

export default {
    mixins: [ResponseMessageHandler],
    methods: {
        async makeOrder() {

        }
    },
    components: {
        SubmitButton,
        ResponseCard
    }
}
</script>

<style>

</style>
